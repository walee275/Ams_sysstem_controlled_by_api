@extends('layouts.main')

@section('title', 'Admin | Students')
@section('contents')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Students</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('fetch_companies') }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                        @if (count($students) > 0)
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student['name'] }}</td>
                                            <td>{{ $student['email'] }}</td>
                                            <td>{{ $student['company']['name'] }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger" role="alert">
                                No record found!
                            </div>

                        @endif
                </div>
            </div>
        </div>
    </main>
@endsection
