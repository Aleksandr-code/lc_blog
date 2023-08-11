@extends('layouts.blog')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <h4 class="section-title mb-2" data-aos="fade-up">Выберите категорию:</h4>
                <div class="row mb-5">
                    <ul class="nav flex-column" data-aos="fade-left">
                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

    </main>
@endsection
