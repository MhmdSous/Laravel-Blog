<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        BlogPost::create([
            'title_ar'=> $request->title_ar,
            'title_en'=> $request->title_en,
            'body_ar'=> $request->body_ar,
            'body_en'=> $request->body_en,
            'image' => $this->storeImage($request, 'image', 'blog'),
            'user_id' => Auth::id(),
        ]);

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view(
            'blog.show',
            [
                'post' => $blogPost,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view(
            'blog.edit',
            [
                'post' => $blogPost,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'body_ar' => $request->body_ar,
            'body_en' => $request->body_en,
            'image' => $this->updateImage($request,$blogPost , 'image', 'blog'),

        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect('/blog');
    }
}
