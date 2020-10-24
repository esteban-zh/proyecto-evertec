@extends('layouts.app')
@section('content')

<div class="container">
    <h1>products details</h1>
    <br>

    <div>
        <a href="{{route('products.create')}}" class="btn btn-outline-secondary" type="submit" id="button-addon2">create
            new product</a>
    </div>
    <br>

    @if (session('status'))
    {{ session('status') }}
    @else

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>product</th>
                <th>image</th>
                <th>price</th>
                <th>stock</th>
                <th>status</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a href="{{route('products.show', $product)}}">{{$product->name}}</a></td>
                <td><img src="@if (substr($product->picture, 4, 8) !== 'products')
                                    /storage/{{$product->picture}}
                                    @else
                                    {{$product->picture}}
                                @endif">
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->status}}</td>
                <td>
                    <a href="{{route('products.edit', $product)}}" class="btn btn-outline-primary" type="submit"
                        id="button-addon2">edit</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-primary" type="submit">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection