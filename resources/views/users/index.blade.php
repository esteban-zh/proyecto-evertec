@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Usuarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>e-mail</th>
                <th>state</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('users.show', $user)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <input name="enable" type="checkbox" class="form-check-input" id="exampleCheck1" onchange="event.preventDefault();
          document.getElementById('{{$user->id}}').submit();" {{$user->enable ? 'checked' : ''}}>
                    @if ($user->enable)
                    Habilitado
                    @else
                    Inhabilitado
                    @endif
                    <form id="{{$user->id}}" action="{{ route('users.update', $user) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection