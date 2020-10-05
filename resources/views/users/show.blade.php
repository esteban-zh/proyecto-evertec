@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$user->name}}</h1>
    <div class="card">
        <div class="card-header">
            @if ($user->enable)
            enable
            @else
            disable
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$user->email}}</h5>
            <ul>
                <li>
                    create: {{$user->created_at->diffForHumans()}}
                </li>
                <li>
                    update: {{$user->updated_at->diffForHumans()}}
                </li>
            </ul>
            <a href="{{url()->previous()}}" class="btn btn-primary">return</a>
        </div>
    </div>
</div>

@endsection