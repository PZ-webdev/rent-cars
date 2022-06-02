@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('transactions.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Lista Rezerwacji
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
                    <h3>Dodaj Rezerwację Samochodu</h3>

                    <form class="form-horizontal form-material mt-4" action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Użytkownik</label>
                            <div class="col-md-12 border-bottom p-0">
                                <select name="id_user" id="id_user"
                                    class="form-control p-0 border-0  @error('id_user') is-invalid @enderror">
                                    <option value="" selected disabled>-- Wybierz Użytkownika --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                                @error('id_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Samochoód</label>
                            <div class="col-md-12 border-bottom p-0">
                                <select name="id_car" id="id_car"
                                    class="form-control p-0 border-0  @error('id_car') is-invalid @enderror">
                                    <option value="" selected disabled>-- Wybierz Samochód --</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->mark }} [{{ $car->model }}]
                                        </option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                                @error('id_car')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Data Rozpoczęcia</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" value="" name="date_start" placeholder="Data Rozpoczęcia"
                                            class="form-control p-0 border-0 @error('date_start') is-invalid @enderror">
                                        @error('date_start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Data Zakończenia</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" value="" name="date_end" placeholder="Data Zakończenia"
                                            class="form-control p-0 border-0 @error('date_end') is-invalid @enderror">
                                        @error('date_end')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Zaliczka</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="number" name="refundable_deposit" placeholder="Zaliczka" min="0"
                                            class="form-control p-0 border-0 @error('refundable_deposit') is-invalid @enderror">
                                        @error('refundable_deposit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
