<?php

namespace App\Http\Controllers\volunteer;

use App\Models\Post;
use App\Models\Form_sign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VPostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('form_id', '0')->orwhereHas('sign', function($query){
            $query->where('volunteer_id', Auth::id());
        })->with(['post_translate', 'author'])->get();

        return view('volunteer.posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::where('ivid', $id)->with(['post_translate', 'author', 'form'])->where(function($query){
            $query->where('form_id', '0')->orwhereHas('sign', function($query){
                    $query->where('volunteer_id', Auth::id());
                });
        })->firstOrFail();

        return view('volunteer.posts.show', ['post' => $post]);
    }
}
