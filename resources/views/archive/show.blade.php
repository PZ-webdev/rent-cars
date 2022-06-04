@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('archives.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Szczegóły Archiwum
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
                    <h3>ID Archiwum: {{ $archives->id }} </h3>
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
                                <td><u>{{ $archives->users->first_name . ' ' . $archives->users->last_name }}</u>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Data Wynajmu</th>
                                <td>{{ $archives->date_start . ' - ' . $archives->date_end }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Samochód</th>
                                <td><a href="{{ route('cars.show', $archives->id_car) }}"
                                        class="link-primary ">{{ $archives->cars->mark . ' ' . $archives->cars->model }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Przejechane Km</th>
                                <td>
                                    {{ $archives->km_traveled }}km
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Obecna kwota za wynajem</th>
                                <td>
                                    {{ $archives->rental_amount }} zł
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Zaliczka</th>
                                <td>{{ $archives->refundable_deposit }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">Kwota do zapłaty</th>
                                <td><strong>{{ $archives->rental_amount - $archives->refundable_deposit }}
                                        zł</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
