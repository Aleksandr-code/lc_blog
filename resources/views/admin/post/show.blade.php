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
                            <li class="breadcrumb-item active">Просмотр поста</li>
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
                    <div class="card-body p-0">
                        <a class="btn btn-dark btn-sm mb-1" href="{{route('admin.post.index')}}">
                            <i class="fa fa-arrow-left">
                            </i>
                            К постам
                        </a>
                        <a class="btn btn-info btn-sm mb-1" href="{{route('admin.post.edit', $post->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Изменить
                        </a>
                        <form class="d-inline" action="{{route('admin.post.delete', $post->id)}}" method="POST" >
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm mb-1">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                        </form>
                        <div class="card-header bg-white mt-3">
                            <h4 class="card-title">{{$post->title}}</h4>
                        </div>
                        <div class="card-header bg-white mt-3">
                            <p>{!!$post->content!!}</p>
                        </div>
                        <p></p>
                    </div>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
