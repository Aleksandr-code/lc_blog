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
                            <li class="breadcrumb-item active">Добавить пост</li>
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
                    <form class="col-sm-12" action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-5">
                            <label>Название</label>
                            <input name="title" type="text" class="form-control" placeholder="Имя поста ..." value="{{old('title')}}">
                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label>Содержимое</label>
                            <textarea name="content" id="summernote">
                                {{old('content')}}
                            </textarea>
                            @error('content')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Добавить превью</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            @error('preview_image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Добавить главное изображение</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
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
                                        <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                        <option {{old('category_id') ==null ? 'selected' : ''}} value="">Другое</option>
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
                                        <option {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('tag_ids')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary mt-3 mb-3">Создать</button>
                        </div>
                    </form>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
