@extends('layouts.app')

@section('content')
<div class="container">
    <h1>update</h1>
    <form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">name</label>
                <input name="name" type="text" class="form-control" id="inputEmail4"
                    value="{{old('name', $product->name)}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Price</label>
                <input name="price" type="number" class="form-control" id="inputPassword4"
                    value="{{old('price', $product->price)}}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input name="picture" type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="custom-file-label" for="inputGroupFile01">choose picture</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
</div>
@endsection