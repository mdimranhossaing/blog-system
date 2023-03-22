@extends('frontend.layout.app')
@section('content')
    <!-- Start Author Area  -->
    <div class="axil-author-area axil-author-banner bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="/assets/images/post-images/author/author-b1.png" alt="Author Images">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h1 class="title"><a href="#">{{$user->name}}</a></h1>
                                    <span class="b3 subtitle">Sr. UX Designer</span>
                                </div>
                                <div class="content">
                                    <p class="b1 description">At 40+ years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from</p>
                                    <ul class="social-share-transparent size-md">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="far fa-envelope"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Author Area  -->

    <!-- Start Post List Wrapper  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h2 class="title mb--40">Articles By {{$user->name}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8">

                    @if (count($posts) > 0)
                        @foreach ($posts as $key => $post)
                            <!-- Start Post List  -->
                            <div class="content-block post-list-view mt--30">
                                <div class="post-thumbnail">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="Post Images">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper" href="{{route('blog.category.index', $post->category->slug)}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{ $post->category->name }}">{{ $post->category->name }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h4>
                                    <div class="post-meta-wrapper">
                                        <div class="post-meta">
                                            <div class="content">
                                                <h6 class="post-author-name">
                                                    <a class="hover-flip-item-wrapper" href="{{route('blog.user.index', $post->user->id)}}">
                                                        <span class="hover-flip-item">
                                                            <span data-text="{{ $post->user->name }}">{{ $post->user->name }}</span>
                                                        </span>
                                                    </a>
                                                </h6>
                                                <ul class="post-meta-list">
                                                    <li> {{date('M d, Y', strtotime($post->created_at))}}</li>
                                                    <li>{{$post->views}} views</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="social-share-transparent justify-content-end">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fas fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post List  -->
                        @endforeach
                    @else
                        <h6 class="title">Posts not found!</h6>
                    @endif

                    <p>{{ $posts->links('vendor.pagination.bootstrap-5') }}</p>

                </div>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                    <!-- Start Sidebar Area  -->
                    <div class="sidebar-inner">

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_categories mb--30">
                            <ul>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="/assets/images/post-images/category-image-01.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Tech</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="/assets/images/post-images/category-image-02.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Style</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="/assets/images/post-images/category-image-03.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Travel</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="/assets/images/post-images/category-image-04.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Food</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_search mb--30">
                            <h5 class="widget-title">Search</h5>
                            <form action="#">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Popular on Blogar</h5>
                            <!-- Start Post List  -->
                            <div class="post-medium-block">

                                @if (count($posts) > 0)
                                    @foreach ($posts as $key => $post)
                                        <!-- Start Single Post  -->
                                        <div class="content-block post-medium mb--20">
                                            <div class="post-thumbnail">
                                                <a href="post-details.html">
                                                    <img src="/assets/images/small-images/blog-sm-03.jpg" alt="Post Images">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h6 class="title"><a
                                                        href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h6>
                                                <div class="post-meta">
                                                    <ul class="post-meta-list">
                                                        <li>Feb 17, 2019</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->
                                    @endforeach
                                @else
                                    <h6 class="title">Posts not found!</h6>
                                @endif

                            </div>
                            <!-- End Post List  -->

                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_social mb--30">
                            <h5 class="widget-title">Stay In Touch</h5>
                            <!-- Start Post List  -->
                            <ul class="social-icon md-size justify-content-center">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-slack"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <!-- End Post List  -->
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_instagram mb--30">
                            <h5 class="widget-title">Instagram</h5>
                            <!-- Start Post List  -->
                            <ul class="instagram-post-list-wrapper">
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-01.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-02.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-03.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-04.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-05.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="#">
                                        <img src="/assets/images/small-images/instagram-06.jpg" alt="Instagram Images">
                                    </a>
                                </li>
                            </ul>
                            <!-- End Post List  -->
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                    <!-- End Sidebar Area  -->



                </div>
            </div>
        </div>
    </div>
    <!-- End Post List Wrapper  -->

    <!-- Start Instagram Area  -->
    <div class="axil-instagram-area axil-section-gap bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">Instagram</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <ul class="instagram-post-list">
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-01.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-02.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-03.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-04.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-05.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="/assets/images/small-images/instagram-md-06.jpg" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Area  -->
@endsection
