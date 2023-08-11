@extends('layouts.blog')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{url('storage/'.$post->preview_image)}}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="blog-post-category">
                                    @if(isset($post->category))
                                        {{$post->category->title}}
                                    @else
                                        Другое
                                    @endif
                                </p>
                                <form class="form-liked" data-id="{{$post->id}}" action="{{route('blog.liked.store', $post->id)}}" method="POST">
                                    @csrf
                                    <span>{{$post->liked_users_count}}</span>
                                    @auth()
                                    <button class="btn btn-outline" type="submit">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="nav-icon fas fa-heart" style="color:#d00000"></i>
                                        @else
                                            <i class="nav-icon far fa-heart" style="color:#d00000"></i>
                                        @endif
                                    </button>
                                    @endauth
                                    @guest()
                                        <i class="nav-icon far fa-heart" style="color:#d00000"></i>
                                    @endguest
                                </form>
                            </div>
                            <a href="{{route('blog.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center" style="margin-top: -70px; margin-bottom: 70px">
                    {{$posts->links()}}
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $randomPost)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{url('storage/'.$randomPost->preview_image)}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">
                                        @if(isset($randomPost->category))
                                            {{$randomPost->category->title}}
                                        @else
                                            Другое
                                        @endif
                                    </p>
                                    <a href="{{route('blog.show', $randomPost->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$randomPost->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $likedPost)
                                <li class="post">
                                    <a href="{{route('blog.show', $likedPost->id)}}" class="post-permalink media">
                                        <img src="{{url('storage/'.$likedPost->preview_image)}}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$likedPost->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{'assets/images/blog_widget_categories.jpg'}}" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
