<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function index(Post $post){
        $tag = Tag::all();
        $category = Category::all();
        $data = $post->latest()->take(6)->get();
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        return view('blog', compact('data', 'category', 'tag', 'popular'));
    }

    public function isi_post($slug){
        $tag = Tag::all();
        $category = Category::all();
        $isi = Post::where('slug', $slug)->increment('votes', 1);
        $isi = Post::where('slug', $slug)->get();
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        return view('blog.isi-post', compact('isi', 'category', 'tag', 'popular'));
    }

    public function list_post(){
        $tag = Tag::all();
        $category = Category::all();
        $data = Post::latest()->paginate(6);
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        $limit_str = new Str;
        return view('blog.list-post', compact('data', 'category', 'tag', 'popular', 'limit_str'));
    }

    public function list_category(Category $post_category){
        $category = Category::all();
        $tag = Tag::all();
        $data = $post_category->posts()->paginate();
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        $limit_str = new Str;
        return view('blog.list-post', compact('data', 'category', 'tag', 'popular', 'limit_str'));
    }

    public function search(request $request){
        $category = Category::all();
        $tag = Tag::all();
        $data = Post::where('judul', 'like', '%'.$request->search.'%')->paginate();
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        $limit_str = new Str;
        return view('blog.list-post', compact('data', 'category', 'tag', 'popular', 'limit_str'));
    }

    public function list_tag(Tag $post_tag){
        $category = Category::all();
        $tag = Tag::all();
        $data = $post_tag->posts()->paginate();
        $popular = Post::orderBy('votes', 'desc')->limit(4)->get();
        $limit_str = new Str;
        return view('blog.list-post', compact('data', 'category', 'tag', 'popular', 'limit_str'));
    }
}
