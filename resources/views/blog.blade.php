@extends('template-blog.content')
@if (count($data) >= 3)
    @section('section-1')
        <!-- SECTION 1 -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                {{-- {{ $popular }} --}}
                <div id="hot-post" class="row hot-post">
                    <div class="col-md-8 hot-post-left">
                        <!-- post -->
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ route('blog.isi', $popular[0]->slug) }}"><img src="{{ $popular[0]->gambar }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('blog.category', $popular[0]->category->slug) }}">{{ $popular[0]->category->name }}</a>
                                </div>
                                <h3 class="post-title title-lg"><a href="{{ route('blog.isi', $popular[0]->slug) }}">{{ $popular[0]->judul }}</a></h3>
                                <div class="post-category">
                                    @foreach ($popular[0]->tags as $item)
                                        <a href="category.html"  style="font-size: 10px">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                                <ul class="post-meta">
                                    <li><a>{{ $popular[0]->users->name }}</a></li>
                                    <li>{{ $popular[0]->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                    <div class="col-md-4 hot-post-right">
                        <!-- post -->
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ route('blog.isi', $popular[1]->slug) }}"><img src="{{ $popular[1]->gambar }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('blog.category', $popular[1]->category->slug) }}">{{ $popular[1]->category->name }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ route('blog.isi', $popular[1]->slug) }}">{{ $popular[1]->judul }}</a></h3>
                                <div class="post-category">
                                    @foreach ($popular[1]->tags as $item)
                                        <a href="category.html"  style="font-size: 10px">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                                <ul class="post-meta">
                                    <li><a>{{ $popular[1]->users->name }}</a></li>
                                    <li>{{ $popular[1]->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ route('blog.isi', $popular[2]->slug) }}"><img src="{{ $popular[2]->gambar }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('blog.category', $popular[2]->category->slug) }}">{{ $popular[2]->category->name }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ route('blog.isi', $popular[2]->slug) }}">{{ $popular[2]->judul }}</a></h3>
                                <div class="post-category">
                                    @foreach ($popular[2]->tags as $item)
                                        <a href="{{ route('blog.tag', $item->slug) }}"  style="font-size: 10px">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                                <ul class="post-meta">
                                    <li><a>{{ $popular[2]->users->name }}</a></li>
                                    <li>{{ $popular[2]->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    @endsection
@endif


@section('section-2')
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="section-title">
				<h2 class="title">Recent posts</h2>
			</div>
		</div>
		<!-- post -->
		@foreach ($data as $terbaru)
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="{{ route('blog.isi', $terbaru->slug) }}"><img src="{{ $terbaru->gambar }}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="{{ route('blog.category', $terbaru->category->slug) }}">{{ $terbaru->category->name }}</a>
						</div>
						<h3 class="post-title"><a href="{{ route('blog.isi', $terbaru->slug) }}">{{ $terbaru->judul }}</a></h3>
						<div class="post-category">
                            @if (count($terbaru->tags) > 0)
                                @foreach ($terbaru->tags as $item)
                                    <a href="{{ route('blog.tag', $item->slug) }}"  style="font-size: 10px">{{ $item->name }}</a>
                                @endforeach
                            @else
                                <a style="font-size: 10px">-</a>
                            @endif
                        </div>
                        <ul class="post-meta">
							<li><a>{{ $terbaru->users->name }}</a></li>
							<li>{{ $terbaru->created_at->diffForHumans() }}</li>
						</ul>
					</div>
				</div>
			</div>
		@endforeach

		<!-- /post -->

	</div>
	<!-- /row -->
@endsection


