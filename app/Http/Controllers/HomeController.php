<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->all();
        //$posts = $post->where('user_id', auth()->user()->id)->get();

        return view('home', compact('posts'));
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);

        //$this->authorize('update-post', $post);
        
        //Usar a instução no método que atualiza no BD tbm
        if(Gate::denies('update-post', $post))
            abort(403, 'Não Autorizado');

        return view('post-update', compact('post'));
    }

    public function rolesPermissions()
    {
        $name_user = auth()->user()->name;
        echo "<h1>{$name_user}</h1>";

        foreach(auth()->user()->roles as $role) {
            echo "<strong>$role->name</strong> -> ";

            $permissions = $role->permissions;

            foreach($permissions as $permission) {
                echo " $permission->name , ";
            }

            echo "<hr>";
        }
    }
}
