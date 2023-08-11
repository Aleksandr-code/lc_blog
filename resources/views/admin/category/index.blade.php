@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Категории</li>
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
                        <a href="{{route('admin.category.create')}}"class="btn btn-primary mb-3">Добавить</a>
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 1%">
                                    ID
                                </th>
                                <th style="width: 10%">
                                    Название
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td>
                                    {{$category->title}}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm mb-1" href="{{route('admin.category.show', $category->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Просмотр
                                    </a>
                                    <a class="btn btn-info btn-sm mb-1" href="{{route('admin.category.edit', $category->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Изменить
                                    </a>
                                    <form class="d-inline" action="{{route('admin.category.delete', $category->id)}}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm mb-1">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
