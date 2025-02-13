<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BlogRequest;
use App\Http\Requests\Backend\UpdatePostRequest;
use App\Models\Blog;
use App\Models\CategoryForBlog;
use App\Models\CommentForBlog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    // public static function middleware()
    // {
    //     return [
    //         new Middleware('admin', except: ['comment']),
    //         new Middleware('auth', only: ['comment'])
    //     ];;
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::query()->orderBy('created_at', 'desc')->paginate(5);
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoryBlogs = CategoryForBlog::all();
        return view('backend.blogs.create', compact('categoryBlogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = $validated['thumbnail']->store('blogs/images', 'public');

        $validated['excerpt'] = Str::limit($validated['content'], 150);
        $validated['slug'] = Str::slug($validated['title']);

        $validated['user_id'] = Auth::user()->id;

        $validated['category_for_blog_id'] = $request->category;

        Blog::query()->create($validated);

        return redirect()->route('admin.blogs.index')->with('ok', __('Your article has been successfully saved.'));
    }


    public function blogShow(Blog $blog, CategoryForBlog $category)
    {
        $blog = $blog->load('user');
        $categoriesBlog = CategoryForBlog::all();
        $relatedBlogs = Blog::where('category_for_blog_id', $blog->category_for_blog_id)->where('id', '!=', $blog->id)->take(4)->get();

        return view('frontend.blogs.single', compact(['blog', 'relatedBlogs', 'categoriesBlog']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        $categoryBlogs = CategoryForBlog::all();
        return view('backend.blogs.edit', compact(['blog', 'categoryBlogs']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Blog $blog)
    {
        $updatedPost = $request->validated();

        if ($request->file('thumbnail')) {
            Storage::disk('public')->delete($blog->thumbnail);
            $updatedPost['thumbnail'] = $request->file('thumbnail')->store('blogs/images', 'public');
        }

        if ($request->category) {
            $updatedPost['category_for_blog_id'] = $request->category;
        }

        $updatedPost['slug'] = Str::slug($updatedPost['title']);
        $blog->update($updatedPost);

        return redirect()->route('admin.blogs.index', compact('blog'))->with('ok', __('You modified this blog.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        Storage::disk('public')->delete($blog->thumbnail);
        $blog->delete();
        return redirect()->route('admin.blogs.index', compact('blog'))->with('ok', __('You deleted this post'));
    }

    public function comment(Blog $blog, Request $request)
    {
        $validated = $request->validate(['content' => 'required|string|max:1000',]);

        $validated['blog_id'] = $blog->id;
        $validated['user_id'] = Auth::id();

        CommentForBlog::create($validated);

        return back()->withok(__('New comment added'));
    }
}
