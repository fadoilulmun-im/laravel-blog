<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipe == 1){
            $post = Post::paginate(10);
        }else{
            $post = Post::where('user_id', Auth::user()->id)->paginate(10);
        }

        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|unique:posts,judul',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $gambar = $request->gambar;
        $img = Image::make($gambar)->encode();
        $new_gambar = time().$gambar->getClientOriginalName();
        Storage::put($new_gambar, $gambar);
        $path = public_path('public/uplouds/posts/' . $new_gambar);
        Storage::move($new_gambar, $path);


        $canvas = Image::canvas(1200, 800);
        $resizeImage  = Image::make($gambar)->resize(1200, 800, function($constraint) {
            $constraint->aspectRatio();
        });
        $canvas->insert($resizeImage, 'center');
        $canvas->save('public/uplouds/posts/'. $new_gambar);

        $post = Post::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uplouds/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        // $resizeImage->move('public/uplouds/posts', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => "required|unique:posts,judul,$id,id",
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Post::findorfail($id);
        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            Image::make($gambar)->save('public/uplouds/posts/'. $new_gambar);
            $canvas = Image::canvas(1200, 800);
            $resizeImage  = Image::make($gambar)->resize(1200, 800, function($constraint) {
                $constraint->aspectRatio();
            });
            $canvas->insert($resizeImage, 'center');
            $canvas->save('public/uplouds/posts/'. $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uplouds/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        }else{
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags);
        Post::whereId($id)->update($post_data);
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post Berhasil Dihapus (Silahkan cek trashed post)');
    }

    public function tampil_hapus(){
        $post = Post::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post Berhasil Direstore (Silahkan cek list post)');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Post Berhasil Dihapus Secara Permanen');
    }

}
