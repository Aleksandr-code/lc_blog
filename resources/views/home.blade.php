@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Рабочее окно') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-title fw-bolder">{{ Auth::user()->name }}</div>
                    {{ __('Вы вошли!') }}
                    <div class="mt-2">
                        <a href="{{route('admin.index')}}" class="link">В личный кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
