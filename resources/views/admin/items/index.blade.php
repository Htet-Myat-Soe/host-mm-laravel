@extends('layouts.admin')


@section('content')

    <div class="container mt-5 shadow-lg p-3">
        <div class="row">
            <div class="col-8 d-flex justify-content-between mx-auto">
                <h3>Items</h3>
                <a href="{{ route('admin.create-items') }}" class="btn btn-dark">Add Item</a>
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
                            <th>Price</th>
                            <th>Units</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @php
                                        $units = $item->units;
                                    @endphp
                                    @foreach ($units as $unit)
                                        <div class="badge  rounded-pill bg-primary">{{ $unit->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit-item',['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.delete-item',['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
