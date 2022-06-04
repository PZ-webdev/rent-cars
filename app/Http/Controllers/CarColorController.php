<?php

namespace App\Http\Controllers;

use App\Models\CarColor;
use Illuminate\Http\Request;

class CarColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carColors = CarColor::all();

        return view('car_color.index', compact('carColors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carColors = CarColor::all();

        return view('car_color.create', compact('carColors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CarColor::create([
            'name' => $request->name,
        ]);

        return redirect()->route('car-colors.index')->with(['type' => 'success', 'message' => 'Dodano kolor.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function show(CarColor $carColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function edit(CarColor $carColor)
    {

        return view('car_color.edit', compact('carColor',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarColor $carColor)
    {
        $carColor->update([
            'name'      => $request->name,
        ]);

        return redirect()->route('car-colors.index')->with(['type' => 'success', 'message' => 'Edytowano kolor.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarColor $carColor)
    {
        $carColor->delete();

        return redirect()->route('car-colors.index')->with(['type' => 'info', 'message' => 'Usunięto kolor.']);
    }
}
