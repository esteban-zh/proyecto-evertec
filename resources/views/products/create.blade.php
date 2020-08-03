@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input name="name" type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Precio</label>
                <input name="price" type="number" class="form-control" id="inputPassword4">
            </div>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input name="picture" type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Escoge la foto</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection