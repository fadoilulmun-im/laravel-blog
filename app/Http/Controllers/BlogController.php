<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    public function index(Post $post){
        $category = Category::all();
        $data = $post->latest()->take(6)->get();
        return view('blog', compact('data', 'category'));
    }

    public function isi_post($slug){
        $category = Category::all();
        $isi = Post::where('slug', $slug)->get();
        return view('blog.isi-post', compact('isi', 'category'));
    }

    public function list_post(){
        $category = Category::all();
        $data = Post::latest()->paginate(6);
        return view('blog.list-post', compact('data', 'category'));
    }

    public function list_category(Category $post_category){
        $category = Category::all();

        $data = $post_category->posts()->paginate();
        return view('blog.list-post', compact('data', 'category'));
    }

    public function search(request $request){
        $category = Category::all();

        $data = Post::where('judul', 'like', '%'.$request->search.'%')->paginate();
        return view('blog.list-post', compact('data', 'category'));
    }
}
