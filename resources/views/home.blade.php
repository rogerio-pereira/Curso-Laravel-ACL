@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($posts as $post)
            @can('view_post', $post)
                <h1>{{$post->title}}</h1>
                <p>{{$post->description}}</p>
                <strong>Autor:</strong> {{$post->user->name}}<br/>
                <a href='{{url("post/$post->id/update")}}'>Editar</a>
                <hr>
            @endcan
        @empty
            <p>Nenhum post cadastrado!</p>
        @endforelse
    </div>
@endsection
