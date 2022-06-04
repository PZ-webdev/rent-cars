@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Kolory samochodów</h4>
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
                    <a href="{{ route('car-colors.create') }}" class="btn tbn-sm btn-success my-3">Dodaj</a>
                    <div class="table-responsive">
                        <table id="car_colors">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kolor</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carColors as $carColor)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $carColor->name }}</td>
                                        <td>
                                            <a href="{{ route('car-colors.edit', $carColor->id) }}"
                                                class="btn btn-sm btn-info">Edytuj</a>

                                                <form action="{{ route('car-colors.destroy', $carColor->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mb-3">Usuń</button>
                                                </form>

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
            $('#car_colors').DataTable();
        });
    </script>
@endsection
