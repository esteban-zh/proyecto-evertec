@extends('layouts.app')
@section('content')

<div class="container">
    <h1>products details</h1>

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
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a href="{{route('users.show', $product)}}">{{$product->name}}</a></td>
                <td>{{$product->email}}</td>
                <td>
                    <input name="enable" type="checkbox" class="form-check-input" onchange="event.preventDefault();
          document.getElementById('{{$product->id}}').submit();" {{$product->enable ? 'checked' : ''}}>
                    @if ($product->enable)
                    enable
                    @else
                    disable
                    @endif
                    <form id="{{$product->id}}" action="{{ route('users.update', $product) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>
                </td>
                <td>
                    <form action="{{ route('users.destroy', $product) }}" method="POST">
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