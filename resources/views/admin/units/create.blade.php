@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row shadow-lg  mt-5 p-3">
            <div class="col-7 mx-auto">
                <h3>Add Unit</h3>
            </div>
            <div class="col-7 mx-auto">
                <form action="{{ route('admin.store-unit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Unit Name</label>
                        <input type="text" name="name" id="name" placeholder="Unit Name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button onclick="history.back()" class="btn btn-warning">Back</button>
                        <button class="btn btn-dark" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
