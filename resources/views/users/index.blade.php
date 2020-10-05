@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Users</h1>

    @if (session('status'))
    {{ session('status') }}
    @else

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>e-mail</th>
                <th>state</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('users.show', $user)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <input name="enable" type="checkbox" class="form-check-input" onchange="event.preventDefault();
          document.getElementById('{{$user->id}}').submit();" {{$user->enable ? 'checked' : ''}}>
                    @if ($user->enable)
                    enable
                    @else
                    disable
                    @endif
                    <form id="{{$user->id}}" action="{{ route('users.update', $user) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
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