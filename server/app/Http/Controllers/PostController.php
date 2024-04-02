<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // Store the uploaded image
            $imagePath = $request->file('image')->move(public_path('/uploads'),  $fileName);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/' . $fileName
        ]);

        return "Post created";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            return $post;
        }
        return "post not found";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, string $id)
    {
        $query = DB::table('posts')->where('id', $id);
        if ($query->first()) {
            $query->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return "Post updated";
        }
        return "Post not found";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return "Post deleted";
        }
        return "Post not found";
    }
}
