@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($posts as $post)
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
            <strong>Autor:</strong> {{$post->user->name}}
            <hr>
        @empty
            <p>Nenhum post cadastrado!</p>
        @endforelse
    </div>
@endsection
