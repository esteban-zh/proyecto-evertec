@extends('layouts.app')
@section('content')

<div class="container">
  <h1>usuarios</h1>

  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>e-mail</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td scope="row">{{$user->id}}</td>
        <td><a href="{{route('users.show', $user)}}">{{$user->name}}</a></td>
        <td scope="row">{{$user->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection