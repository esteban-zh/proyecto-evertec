@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mx-3">
        <div style="width: 100%;">
            <img src="@if (substr($product->picture, 4, 8) !== 'products')
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
        </div>
    </div>
</div>
@endsection