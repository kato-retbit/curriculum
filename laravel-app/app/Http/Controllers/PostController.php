<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostImageUploader;

class PostController extends Controller
{
    public function __construct(private readonly PostImageUploader $imageUploader)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(2);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->safe()->except('image');
        $data['image_path'] = $this->imageUploader->store($request->file('image'));

        $post = Post::create($data);

        return redirect()->route('posts.show', $post)->with('success', '投稿しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->safe()->except('image');

        if ($imagePath = $this->imageUploader->store($request->file('image'))) {
            $data['image_path'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', '削除しました');
    }
}
