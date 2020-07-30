@extends('layouts.app')
@section('content')

<p><strong>ID:</strong> {{$user->id}}</p><br>
<p><strong>Nombre:</strong> {{$user->name}}</p><br>
<p><strong>Email:</strong> {{$user->email}}</p><br>
<p><strong>Verificacion de email:</strong> {{$user->email_verified_at}}</p><br>
<p><strong>Habilitado:</strong> {{$user->enable}}</p><br>
<p><strong>Fecha de registro:</strong> {{$user->created_at}}</p><br>
<p><strong>Fecha de actualizacion:</strong> {{$user->updated_at}}</p><br>

<a href="{{route('users.edit',$user)}}">editar datos</a>

@endsection