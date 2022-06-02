@extends('layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Archiwum</h4>
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
                        <table id="archive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Użytkownik</th>
                                    <th scope="col">Samochód</th>
                                    <th scope="col">Data Rozp.</th>
                                    <th scope="col">Data Zak.</th>
                                    <th scope="col">Kwota do zapł.</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $archive)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>
                                            <a class="link"
                                                href="{{ route('users.show', $archive->users->id) }}">{{ $archive->users->first_name . ' ' . $archive->users->last_name }}</a>
                                        </td>
                                        <td>
                                            <a class="link"
                                                href="{{ route('cars.show', $archive->cars->id) }}">{{ $archive->cars->mark }}</a>
                                        </td>
                                        <td>{{ $archive->date_start }}</td>
                                        <td>{{ $archive->date_end }}</td>
                                        <td>{{ $archive->rental_amount - $archive->refundable_deposit }} zł</td>
                                        <td>
                                            <a href="{{ route('archives.edit', $archive->id) }}"
                                                class="btn btn-sm btn-info">Edytuj</a>

                                            <a href="{{ route('archives.show', $archive->id) }}"
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
            $('#archive').DataTable();
        });
    </script>
@endsection
