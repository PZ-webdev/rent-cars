@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Użytkownicy
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
                    <h3>Edycja użytkownika</h3>
                    <h5>ID: {{ $user->id }}</h5>
                    <form class="form-horizontal form-material mt-4" action="{{ route('users.update', $user) }}"
                        method="POST">
                        @csrf 
                        @method('PUT') 
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Imie</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="first_name" placeholder="Imie" min="0"
                                        value="{{ $user->first_name }}"
                                        class="form-control p-0 border-0 @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nazwisko</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="last_name" placeholder="Nazwisko" min="0"
                                        value="{{ $user->last_name }}"
                                        class="form-control p-0 border-0 @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">E-mail</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="email" placeholder="E-mail" min="0"
                                        value="{{ $user->email }}"
                                        class="form-control p-0 border-0 @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nr Telefonu</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="phone" placeholder="Nr Telefonu" min="0"
                                        value="{{ $user->phone }}"
                                        class="form-control p-0 border-0 @error('phone') is-invalid @enderror">
                                    @error('phone')
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
