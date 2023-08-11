@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Редактировать пост</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-sm-5">
                                <label>Название</label>
                                <input name="title" type="text" class="form-control" placeholder="Имя поста ..." value="{{$post->title}}">
                                @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label>Содержимое</label>
                                <textarea name="content" id="summernote">
                                    {{$post->content}}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label>Превью</label>
                                <div class="col-sm-6 mb-2">
                                    <img src="{{url('storage/'.$post->preview_image)}}" alt="preview_image" class="w-50">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="preview_image" name="preview_image">
                                    <label class="custom-file-label" for="preview_image">Выберите файл</label>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label>Главное изображение</label>
                                <div class="col-sm-6 mb-2">
                                    <img src="{{url('storage/'.$post->main_image)}}" alt="main_image" class="w-50">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                    <label class="custom-file-label" for="main_image">Выберите файл</label>
                                </div>
                                @error('main_image')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option {{$post->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                        <option {{$post->category_id == null ? 'selected' : ''}} value="">Другое</option>
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Выберите теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="теги..." style="width: 100%;" name="tag_ids[]">
                                        @foreach($tags as $tag)
                                            <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tag_ids')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary mt-3 mb-3">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
