@extends('layouts.app')
@section('content')

{{$user}}
{{-- <form method="POST" action="{{route('users.update', $InfoUser)}}">
@csrf
@method('PATCH')
</form> --}}

@endsection