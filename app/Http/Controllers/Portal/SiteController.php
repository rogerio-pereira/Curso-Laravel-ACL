<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;

use App\Post;
use Gate;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('portal.home.index');
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
