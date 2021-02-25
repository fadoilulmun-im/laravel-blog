@extends('template-blog.content')

@section('section-1')
    @foreach ($isi as $isiPost)
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset($isiPost->gambar) }}');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="{{ route('blog.category', $isiPost->category->slug) }}">{{ $isiPost->category->name }}</a>
                    </div>
                    <h1>{{ $isiPost->judul }}</h1>
                    <div class="post-category">
                        @foreach ($isiPost->tags as $item)
                            <a href="category.html"  style="font-size: 10px">{{ $item->name }}</a>
                        @endforeach
                    </div>
                    <ul class="post-meta">
                        <li><a href="">{{ $isiPost->users->name }}</a></li>
                        <li>{{ $isiPost->created_at }}</li>
                        {{-- <li><i class="fa fa-comments"></i> 3</li>
                        <li><i class="fa fa-eye"></i> 807</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('section-2')
    @foreach ($isi as $isiPost)
        <p>{!! $isiPost->content !!}</p>
    @endforeach
@endsection
