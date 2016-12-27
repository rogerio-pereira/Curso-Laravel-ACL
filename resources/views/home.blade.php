@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($posts as $post)
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
            <strong>Autor:</strong> {{$post->user->name}}<br/>
            @can('update-post', $post)
                <a href='{{url("post/$post->id/update")}}'>Editar</a>
            @endcan
            <hr>
        @empty
            <p>Nenhum post cadastrado!</p>
        @endforelse
    </div>
@endsection
