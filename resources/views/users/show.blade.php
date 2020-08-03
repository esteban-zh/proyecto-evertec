@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$user->name}}</h1>
    <div class="card">
        <div class="card-header">
            @if ($user->enable)
            Habilitado
            @else
            Inhabilitado
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$user->email}}</h5>
            <ul>
                <li>
                    Creado: {{$user->created_at->diffForHumans()}}
                </li>
                <li>
                    Actualizado: {{$user->updated_at->diffForHumans()}}
                </li>
            </ul>
            <a href="{{url()->previous()}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@endsection