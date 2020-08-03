@extends('layouts.app')

@section('content')
<div class="container">
    <div class="input-group d-flex justify-content-around">
        <form class="d-flex" action="{{route('home')}}" method="GET">
            @csrf
            <input name="name" type="text" class="form-control" placeholder="Buscar..."
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
            </div>
        </form>
        @if (Auth::user()->admon)
        <a href="{{route('users.create')}}" class="btn btn-outline-secondary" type="submit" id="button-addon2">Crear un
            nuevo usuario</a>
        @endif
    </div>
    <div class="card-group m-3">
        @if ($products->count() > 0)
        @foreach ($products as $product)
        <div class="card mx-3">
            <img src="@if (substr($product->picture, 0, 5) !== 'https')
                /storage/{{$product->picture}}
                @else
                {{$product->picture}}
            @endif" class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text"><small class="text-muted">${{number_format($product->price)}}</small></p>
            </div>
        </div>
        @endforeach
        @else
        No hay productos
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection