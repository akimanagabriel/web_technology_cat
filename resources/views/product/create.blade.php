@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h5>Create a new product</h5>
    <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm rounded-1">Back</a>
</div>


<form class="w-50" action="{{ route('product.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Product name</label>
        <input value="{{ old('pName') }}" type="text" name="pName" class="form-control">
        @error('pName')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product price</label>
        <input value="{{ old('pPrice') }}" type="number" name="pPrice" class="form-control">
        @error('pPrice')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product quantity</label>
        <input value="{{ old('pQuantity') }}" type="number" name="pQuantity" class="form-control">
        @error('pQuantity')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product description</label>
        <textarea name="pDescription" class="form-control"> {{ old('pName') }}</textarea>
        @error('pDescription')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary px-3 rounded-1 mt-3">Save Product</button>
    </div>
</form>

@endsection