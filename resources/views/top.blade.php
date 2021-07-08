@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-2 mx-auto mt-5">
        @if (session('error'))
        <div class="alert alert-danger error">
            {{ session('error') }}
        </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

	<h1 class="text-center py-5">全国特産品ECサイト</h1>
    <div class="row">
        <div class="col-xs-12 col-md-6 text-center mt-5">
            <h5>まだアカウントを<br>お持ちでない方はこちら</h5>
            <div class="col-xs-12 col-md-12 text-center mt-4">
                <a href="{{ route('auth.register') }}" class="btn btn-primary btn-md">新規登録</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 text-center mt-5 mb-5">
            <h5>すでにアカウントを<br>お持ちの方はこちら</h5>
            <div class="col-xs-12 col-md-12 text-center mt-4">
                <a href="{{ route('auth.login') }}" class="btn btn-primary btn-md">ログイン</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 text-center mt-5">
            <a href="{{ route('applicant.signup') }}"><button type="button" class="btn btn-primary btn-md">出品者登録申請</button></a>
        </div>
    </div>
</div>

@endsection

