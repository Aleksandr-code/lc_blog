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
                                <form action="{{route('blog.liked.store', $post->id)}}" method="POST">
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
        </div>

    </main>
@endsection
