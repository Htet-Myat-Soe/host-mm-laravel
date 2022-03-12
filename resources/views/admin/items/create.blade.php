@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row shadow-lg  mt-5 p-3">
            <div class="col-7 mx-auto">
                <h3>Add Item</h3>
            </div>
            <div class="col-7 mx-auto">
                <form action="{{ route('admin.store-item') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" name="name" id="name" placeholder="Item Name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Item Price</label>
                        <input type="text" name="price" id="price" placeholder="Item Price" class="form-control">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="units" class="form-label">Item Units</label>
                        <select name="units[]" id="units" class="form-select" multiple="multiple">
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
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

@push('scripts')
   <script>
        $('#units').select2({
         placeholder : "Select an option",
         allowClear: true
        })
   </script>
@endpush
