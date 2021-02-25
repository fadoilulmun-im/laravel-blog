<div class="col-md-4">
    <!-- ad widget-->
    {{-- <div class="aside-widget text-center">
        <a href="#" style="display: inline-block;margin: auto;">
            <img class="img-responsive" src="{{ asset('assets-callie/img/ad-3.jpg') }}" alt="">
        </a>
    </div> --}}
    <!-- /ad widget -->

    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="https://web.facebook.com/sfadoilul/" class="social-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        {{-- <span>21.2K<br>Followers</span> --}}
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/Fadoilulmun_im" class="social-twitter" target="_blank">
                        <i class="fa fa-twitter"></i>
                        {{-- <span>10.2K<br>Followers</span> --}}
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/fadoilulmun.im/" class="social-instagram"target="_blank">
                        <i class="fa fa-instagram"></i>
                        {{-- <span>5K<br>Followers</span> --}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach ($category as $hasil)
                    <li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }} <span>{{ $hasil->posts->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- newsletter widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Newsletter</h2>
        </div>
        <div class="newsletter-widget">
            <form>
                <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                <input class="input" name="newsletter" placeholder="Enter Your Email">
                <button class="primary-button">Subscribe</button>
            </form>
        </div>
    </div>
    <!-- /newsletter widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>
        <!-- post -->
        @foreach ($popular as $post)
            <div class="post post-widget">
                <a class="post-img" href="{{ route('blog.isi', $post->slug) }}"><img src="{{ url($post->gambar) }}" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('blog.isi', $post->slug) }}">{{ $post->judul }}</a></h3>
                    <div class="post-category">
                        @foreach ($post->tags as $item)
                            <a href="{{ route('blog.tag', $item->slug) }}"  style="font-size: 10px">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <!-- /post -->
    </div>
    <!-- /post widget -->
</div>
