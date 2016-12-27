<div class="container">
    @forelse ($posts as $post)
        @can('view_post', $post)
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
            <strong>Autor:</strong> {{$post->user->name}}<br/>

            @can('edit_post', $post)
                <a href='{{url("post/$post->id/update")}}'>Editar</a>
            @endcan
            <hr>
        @endcan
    @empty
        <p>Nenhum post cadastrado!</p>
    @endforelse
</div>
