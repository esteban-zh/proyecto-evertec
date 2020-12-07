@extends('layouts.app')
@section('content')

<div class="container">
    <h1>products details</h1>
    <br>

    <div>
        <a href="#" class="btn btn-outline-secondary" type="submit" id="button-addon2">create
            new product</a>
    </div>
    <br>
    <div>

        <panel-component></panel-component>
        @include('api.edit')

    </div>
</div>

@endsection