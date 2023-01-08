<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => $posts = Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(10)->withQueryString(),
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if ($request['publish'] && !$post->published_at)
            $attributes['published_at'] = now();
        elseif (!$request['publish'] && $post->published_at)
            $attributes['published_at'] = null;

        $post->update($attributes);

        return redirect('/admin/posts')->with('success', 'Post updated successfully!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => ['required'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    public function store(Request $request)
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            'published_at' => $request['publish'] ? now() : null
        ]));

        return back()->with('success', 'Post Updated!');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
