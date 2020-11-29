@extends('layouts.app')

@section('content')
@include('products._import_modal')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><span>x</span></button>
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>

    @endif
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        <button class="close" data-dismiss="alert"><span>x</span></button>
        {{session('status')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADMIN PANEL') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('products.index')}}">
                            Manage products
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('users.index')}}">
                            Manage users
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('products.export')}}">
                            Export Products
                        </a>
                    </div>
                </div>

                <div class="list-group">
                    <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                        data-target="#importModal">
                        import Products
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection