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
                    <h3>Edycja Rezerwacji Samochodu</h3>
                    <h5>ID: {{ $transaction->id }}</h5>
                    <form class="form-horizontal form-material mt-4"
                        action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($transaction->km_traveled == null)
                            <div class="col-md-12 border border-danger my-3 p-3">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Przejechane Km.</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="number" name="km_traveled" placeholder="Przejechane Km" min="0"
                                            class="form-control p-0 border-0 @error('km_traveled') is-invalid @enderror">
                                        @error('km_traveled')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Użytkownik</label>
                            <div class="col-md-12 border-bottom p-0">
                                <select name="id_user" id="id_user"
                                    class="form-control p-0 border-0  @error('id_user') is-invalid @enderror">
                                    <option selected disabled>-- Wybierz Użytkownika --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $transaction->id_user == $user->id ? 'selected' : '' }}>
                                            {{ $user->first_name . ' ' . $user->last_name }}</option>
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
                                    <option selected disabled>-- Wybierz Samochód --</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}"
                                            {{ $transaction->id_car == $car->id ? 'selected' : '' }}>{{ $car->mark }}
                                            [{{ $car->model }}]
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
                                        <input type="date" name="date_start" placeholder="Data Rozpoczęcia"
                                            value="{{ $transaction->date_start }}"
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
                                        <input type="date" name="date_end" placeholder="Data Zakończenia"
                                            value="{{ $transaction->date_end }}"
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
                                            value="{{ $transaction->refundable_deposit }}"
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
                                <button class="btn btn-success">Edytuj</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
