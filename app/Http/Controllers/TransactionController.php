<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Models\Car;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('cars')->orderBy('km_traveled', 'DESC')->get();

        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $cars = Car::all();

        return view('transaction.create', compact('users', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
    {
        $checkCar = DB::select("SELECT check_car_is_available($request->id_car, '$request->date_start')");
        $check = $checkCar[0]->check_car_is_available;

        if (!$check) {
            return redirect()->route('transactions.index')->with(['type' => 'info', 'message' => 'Samochód jest w trakcie rezerwacji.']);
        }

        $car = Car::findOrFail($request->id_car);

        $rental_amount = $car->rent_price;
        $car_mileage = $car->car_mileage;

        Transaction::create([
            'id_user'            => $request->id_user,
            'id_car'             => $request->id_car,
            'date_start'         => $request->date_start,
            'date_end'           => $request->date_end,
            'km_before'          => $car_mileage,
            'refundable_deposit' => $request->refundable_deposit,
            'km_traveled'        => null,
            'rental_amount'      => $rental_amount,
            'amount_to_pay'      => $this->dateDiffInDays($request->date_start,  $request->date_end) + $rental_amount,
        ]);

        return redirect()->route('transactions.index')->with(['type' => 'success', 'message' => 'Dodano rezerwację.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $users = User::all();
        $cars = Car::all();

        return view('transaction.edit', compact('transaction', 'users', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionStoreRequest $request, Transaction $transaction)
    {
        if ($request->km_traveled != null) {
            DB::select("SELECT update_car(" .  $request->id_car . ", " . $request->km_traveled . ")");
        }

        $transaction->update([
            'id_user'            => $request->id_user,
            'id_car'             => $request->id_car,
            'date_start'         => $request->date_start,
            'date_end'           => $request->date_end,
            'refundable_deposit' => $request->refundable_deposit,
            'km_traveled'        => $request->km_traveled != 0 ? $request->km_traveled : null,
        ]);

        return redirect()->route('transactions.index')->with(['type' => 'success', 'message' => 'Edytowano rezerwację.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with(['type' => 'info', 'message' => 'Usunięto rezerwację.']);
    }

    public function transferArchives()
    {
        DB::select("CALL transfer_data_to_archives()");

        return redirect()->route('transactions.index')->with(['type' => 'success', 'message' => 'Przeniesiono rezerwacje do archiwum.']);
    }

    private function dateDiffInDays($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400)) + 1;
    }
}
