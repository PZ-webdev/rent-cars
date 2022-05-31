@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Samochody</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table id="cars">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Marka</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Nr rejestracyjny</th>
                                    <th scope="col">Rok prod.</th>
                                    <th scope="col">Kolor</th>
                                    <th scope="col">Cena Wypożycz.</th>
                                    <th scope="col">Przebieg</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $car->mark }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->registration_number }}</td>
                                        <td>{{ $car->year_production }}</td>
                                        <td>{{ $car->colors->name }}</td>
                                        <td>${{ $car->rent_price }}</td>
                                        <td>{{ $car->car_mileage }}</td>
                                        <td>
                                            <a href="{{ route('cars.show', $car->id) }}"
                                                class="btn btn-sm btn-primary">Szczegóły</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#cars').DataTable();
        });
    </script>
@endsection
