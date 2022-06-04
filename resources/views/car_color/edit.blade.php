@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('car-colors.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Edycja Koloru
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal form-material mt-4"
                    action="{{ route('car-colors.update', $carColor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Kolor</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="name" placeholder="Kolor" min="0"
                                    value="{{ $carColor->name }}"
                                    class="form-control p-0 border-0 @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Zapisz</button>
                        </div>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
