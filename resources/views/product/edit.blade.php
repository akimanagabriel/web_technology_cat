@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h5>edit existing product</h5>
    <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm rounded-1">Back</a>
</div>


<form class="w-50" action="{{ route('product.update', $product->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">Product name</label>
        <input value="{{ $product->name }}" type="text" name="pName" class="form-control">
        @error('pName')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product price</label>
        <input value="{{ $product->price }}" type="number" name="pPrice" class="form-control">
        @error('pPrice')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product quantity</label>
        <input value="{{ $product->quantinty }}" type="number" name="pQuantity" class="form-control">
        @error('pQuantity')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Product description</label>
        <textarea name="pDescription" class="form-control">{{ $product->description }}</textarea>
        @error('pDescription')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary px-3 rounded-1 mt-3">Save changes</button>
    </div>
</form>

@endsection