@extends('layouts.app')

@section('content')
<div class="main-container">

    <div class="container-products">

        <div class="container">
            <h1 class="text-dark d-flex justify-content-center h-big">Order No. {{$order->request_id}}</h1>
            <div class="alert @if ($order->status == 'APPROVED')
                alert-primary
            @else
                alert-danger
            @endif" role="alert">
                {{$order->status}}
            </div>
            @if ($order->status != 'APPROVED')
            <div class="text-center">
                <form class="d-inline" method="POST" action="{{ route('orders.payments.store', $order) }}">
                    @csrf
                    <button class="btn btn-success btn-lg mb-3 w-auto" type="submit">Retry Order</button>
                </form>
            </div>
            @endif

            <table class="table table-striped p-edit-2">
                <thead>
                    <tr class="text-muted">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Unit price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                    <tr scope="row">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td class="text-success">${{number_format($product->price)}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td class="text-success">${{number_format($product->total)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-info btn-lg mb-3 w-auto" href="{{route('orders.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection