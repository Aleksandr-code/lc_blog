@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <a href="{{route('admin.user.create')}}"class="btn btn-primary mb-3">Добавить</a>
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
                                    Имя пользователя
                                </th>
                                <th style="width: 10%">
                                    Email
                                </th>
                                <th style="width: 10%">
                                    Роль
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    @foreach($roles as $id => $role)
                                        @if($user->role == $id)
                                            {{$role}}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm mb-1" href="{{route('admin.user.show', $user->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Просмотр
                                    </a>
                                    <a class="btn btn-info btn-sm mb-1" href="{{route('admin.user.edit', $user->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Изменить
                                    </a>
                                    <form class="d-inline" action="{{route('admin.user.delete', $user->id)}}" method="POST" >
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
