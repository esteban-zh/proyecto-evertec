@extends('layouts.app')

@section('content')
<div class="main-container">

    <div class="container-filter">
        <div class="container">
            {{-- Administrator menu --}}
            @auth
            @if (Auth::user()->admin or Auth::user()->main_admin)
            {{-- buttons --}}
            <div>
                <a class="btn btn-dark mb-2" href="{{ route('products.create') }}">+ Create a new Product</a>
                <a class="btn btn-dark mb-2" href="{{ route('products.index') }}">View products as user</a>
                <a class="btn btn-dark mb-2" href="{{ route('users.index') }}">Manage Users</a>
            </div>
            @endif
            @endauth

            <hr>

            <h3>Total in cart <span class="badge badge-success">$ {{number_format($cart->total)}}</span></h3>

            <hr>
        </div>
    </div>

    <div class="container-products">

        <div class="container">
            <h1 class="text-dark d-flex justify-content-center h-big">Shopping cart</h1>

            @if ($cart->products->isEmpty())
            <div class="alert alert-warning">
                There are no products in the cart
            </div>
            @else


            <div class="text-center">
                <form class="d-inline" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <button class="btn btn-success btn-lg mb-3 w-auto" type="submit"> Confirm Order </button>
                </form>
            </div>

            <table class="table table-striped p-edit-2">
                <thead>
                    <tr class="text-muted">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Unit price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Set up</th>
                        <th>remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                    <tr scope="row">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td class="text-success">${{number_format($product->price)}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td class="text-success">${{number_format($product->total)}}</td>
                        <td>
                            <div class="d-flex">
                                <form method="POST"
                                    action="{{ route('products.carts.store', ['product' => $product->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">+</button>
                                </form>

                                <form method="POST"
                                    action="{{ route('products.carts.removeOne', ['product' => $product, 'cart' => $cart]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-info">-</button>
                                </form>

                            </div>
                        </td>
                        <td>
                            <form method="POST"
                                action="{{ route('products.carts.destroy', [ 'cart' => $cart->id, 'product' => $product->id ]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection