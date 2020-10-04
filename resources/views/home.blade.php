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
        <a href="{{route('products.create')}}" class="btn btn-outline-secondary" type="submit" id="button-addon2">Crear
            un
            nuevo producto</a>
        @endif
    </div>
    <div class="card-group m-3">
        @if ($products->count() > 0)
        @foreach ($products as $product)
        <div class="card mx-3">
            <div style="width: 100%;">
                <img src="@if (substr($product->picture, 0, 5) !== 'https')
                    /storage/{{$product->picture}}
                    @else
                    {{$product->picture}}
                @endif" class="card-img-top" height="250" alt="{{$product->name}}">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p>{{$product->description}}</p>
                <p class="card-text"><small class="text-muted">${{number_format($product->price)}}</small></p>
                <p>{{$product->stock}}</p>
                <p>{{$product->status}}</p>
                <form class="d-inline" method="POST"
                    action="{{route('products.carts.store', ['product' => $product])}}">
                    @csrf
                    <button type="submit" class="btn btn-success">Add to cart</button>
                </form>
                @if (Auth::user()->admon)
                <a href="{{route('products.edit', $product)}}" class="btn btn-outline-primary" type="submit"
                    id="button-addon2">Actualizar</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-primary" type="submit">eliminar</button>
                </form>
                @endif
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
    {{-- {{ $products->render() }} --}}
</div>
@endsection