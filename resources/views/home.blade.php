@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-group m-4">
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