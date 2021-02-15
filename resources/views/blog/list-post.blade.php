@extends('template-blog.content')
@section('section-2')
    <div class="col-md">

        @foreach ($data as $list_post)
            <!-- post -->
            <div class="post post-row">
                <a class="post-img" href="{{ route('blog.isi', $list_post->slug) }}"><img src="{{ asset($list_post->gambar) }}" alt="{{ $list_post->judul }}"></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="{{ route('blog.category', $list_post->category->slug) }}">{{ $list_post->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('blog.list', $list_post->slug) }}">{{ $list_post->judul }}</a></h3>
                    <ul class="post-meta">
                        <li><a href="author.html">{{ $list_post->users->name }}</a></li>
                        <li>{{ $list_post->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
            <!-- /post -->
        @endforeach


        <div class="section-row loadmore text-center">
            {{ $data->links() }}
        </div>
    </div>
@endsection
