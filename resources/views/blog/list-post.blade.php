@extends('template-blog.content')
@section('section-2')
    <div class="col-md">

        @foreach ($data as $list_post)
            <!-- post -->
            <div class="post post-row">
                <a class="post-img" href="{{ route('blog.isi', $list_post->slug) }}"><img src="{{ $list_post->gambar }}" alt="{{ $list_post->judul }}"></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="{{ route('blog.category', $list_post->category->slug) }}">{{ $list_post->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('blog.list', $list_post->slug) }}">{{ $list_post->judul }}</a></h3>
                    <div class="post-category">
                        @foreach ($list_post->tags as $item)
                            <a href="category.html"  style="font-size: 10px">{{ $item->name }}</a>
                        @endforeach
                    </div>
                    <div>
                        {!! $limit_str->limit($list_post->content, $limit = 200, $end = '.......') !!}
                        @if (strlen($list_post->content) > 200)
                            <a href="{{ route('blog.isi', $list_post->slug) }}" class="text-primary" style="font-size: 12px">Baca Selengkapnya</a>
                        @endif
                    </div>
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
