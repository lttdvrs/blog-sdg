<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;

use App\Http\Resources\BlogPostCollection;
use App\Http\Resources\BlogPostResource;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return new BlogPostCollection(BlogPost::all()->loadMissing('blogmedia'));
    }

    public function store(StoreBlogPostRequest $request)
    {
        new BlogPostResource(BlogPost::create($request->all()));
    }

    public function show(BlogPost $post)
    {
        return new BlogPostResource($post->loadMissing('blogmedia'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $post)
    {
        $post->update($request->all());
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
    }
}
