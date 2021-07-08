@extends('layouts.app')

@section('title', 'ユーザ登録画面')

@section('content')
    <div class="container">
        @include('common.error_card_list')
        <div class="text-center mt-3">
            <h3>ログイン画面</h3>
        </div>
        {!! Form::open(['route' => 'login.post']) !!}
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-7">
                メールアドレス
                <div class="row">
                    <div class="form-group col-sm-12 form-inline">
                        {!! Form::email('email', old('email'), ['class' => 'form-control offset-sm-1 col-sm-11']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-7">
                パスワード
                <div class="row">
                    <div class="form-group col-sm-12 form-inline">
                        {!! Form::password('password', ['class' => 'form-control offset-sm-1 col-sm-11']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            {!! Form::submit('ログイン', ['class' => 'btn btn-primary mt-3']) !!}
        </div>
        {!! Form::close() !!}
        <div class="text-center">
            <a href="{{ route('auth.register') }}">まだ登録がお済みでないかたはこちら</a>
        </div>
    </div>
@endsection
