@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('transactions.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Szczegóły Rezerwacji
                </h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ route('index') }}" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">

                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mb-3">Usuń</button>
                    </form>

                    <h3>ID Rezerwacji: {{ $transaction->id }}</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dane</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Imie i Nazwisko</th>
                                <td><u>{{ $transaction->users->first_name . ' ' . $transaction->users->last_name }}</u>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Data Wynajmu</th>
                                <td>{{ $transaction->date_start . ' - ' . $transaction->date_end }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Samochód</th>
                                <td><a href="{{ route('cars.show', $transaction->id_car) }}"
                                        class="link-primary ">{{ $transaction->cars->mark . ' ' . $transaction->cars->model }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Przejechane Km</th>
                                <td>
                                    {{ $transaction->km_traveled }}km
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Obecna kwota za wynajem</th>
                                <td>
                                    {{ $transaction->rental_amount }} zł
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Zaliczka</th>
                                <td>{{ $transaction->refundable_deposit }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">Kwota do zapłaty</th>
                                <td><strong>{{ $transaction->rental_amount - $transaction->refundable_deposit }}
                                        zł</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
