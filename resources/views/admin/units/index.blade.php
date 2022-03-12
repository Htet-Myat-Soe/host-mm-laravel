@extends('layouts.admin')


@section('content')

    <div class="container mt-5 shadow-lg p-3">
        <div class="row">
            <div class="col-8 d-flex justify-content-between mx-auto">
                <h3>Units</h3>
                <a href="{{ route('admin.create-units') }}" class="btn btn-dark">Add Unit</a>
            </div>
            <div class="col-8 mx-auto my-2">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="col-8 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{ $unit->id }}</td>
                                <td>{{ $unit->name }}</td>
                                <td>
                                    <a href="{{ route('admin.edit-unit',['id' => $unit->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.delete-unit',['id' => $unit->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
