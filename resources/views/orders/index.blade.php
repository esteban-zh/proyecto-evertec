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
                <a class="btn btn-dark btn-lg mb-2" href="{{ route('products.index') }}">Back to Products</a>
                <a class="btn btn-dark btn-lg" href="{{ route('carts.index') }}">Back to Cart</a>
            </div>
            @endif
            @endauth
        </div>

    </div>

    <div class="container-products">

        <div class="container">
            <h1 class="text-dark d-flex justify-content-center h-big">Orders Details</h1>


            <div class="container d-flex flex-column justify-content-center">


                <table class="table table-striped p-edit-2 w-auto">
                    <thead>
                        <tr class="text-muted">
                            <th>Id</th>
                            <th>Status</th>
                            <th>Customer id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr scope="row">
                            <td>{{$order->id}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->customer_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection