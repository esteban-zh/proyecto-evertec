@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input name="name" type="text" class="form-control" id="inputEmail4" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Precio</label>
                <input name="price" type="number" class="form-control" id="inputPassword4" value="{{old('price')}}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">descripcion</label>
                <input name="description" type="text" class="form-control" id="inputPassword4"
                    value="{{old('description')}}">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">stock</label>
                <input name="stock" type="number" class="form-control" id="inputPassword4" value="{{old('stock')}}">
                @error('stock')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">status</label>
                <input name="status" type="text" class="form-control" id="inputPassword4" value="{{old('status')}}">
                @error('status')
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
                <label class="custom-file-label" for="inputGroupFile01">Escoge la foto</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection