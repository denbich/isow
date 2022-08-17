<?php

namespace App\Http\Controllers\coordinator;

use App\Models\Form;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post_translate;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CPostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['post_translate', 'form', 'author'])->get();
        return view('coordinator.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $forms = Form::with('form_translate')->get();
        return view('coordinator.posts.create', ['forms' => $forms]);
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        if ($validated['post_type'] != "general") $form_id = $validated['form_select']; else $form_id = 0;

        $post = Post::create([
            'ivid' => Str::uuid(),
            'form_id' => $form_id,
            'author_id' => Auth::id(),
        ]);

        Post_translate::create([
            'post_id' => $post->id,
            'locale' => $validated['locale'],
            'title' => $validated['title'],
            'content' => str_replace('"', "'", str_replace("\r\n", '', $validated['content'])),
        ]);

        return redirect()->route('c.post.show', [$post->ivid])->with(['created_post' => true]);
    }

    public function show($id)
    {
        $post = Post::where('ivid', $id)->with(['post_translate', 'author', 'form'])->firstOrFail();
        return view('coordinator.posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::where('ivid', $id)->with(['post_translate'])->firstOrFail();
        $forms = Form::with('form_translate')->get();
        return view('coordinator.posts.edit', ['post' => $post, 'forms' => $forms]);
    }

    public function update(PostRequest $request, $id)
    {
        $validated = $request->validated();
        Post::where('ivid', $id)->with('post_translate')->firstOrFail()->post_translate()->update([
            'title' => $validated['title'],
            'content' => str_replace('"', "'", str_replace("\r\n", '', $validated['content'])),
        ]);

        return back()->with(['edited_post' => true]);
    }

    public function destroy($id)
    {
        Post::where('ivid', $id)->delete();
        return redirect()->route('c.post.list')->with(['delete_post' => true]);
    }
}
