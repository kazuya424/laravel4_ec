@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center mt-3">
        <h3>出品者登録申請</h3>
    </div>

    @include('users.user_error')
    <form method="POST" action="{{ route('applicant.apply') }}">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-sm-7">
                メールアドレス
                <div class="row">
                    <div class="form-group col-sm-12 form-inline">
                        <input type="text" class="form-control offset-sm-1 col-sm-11" name="email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <input class="btn btn-primary mt-3" type="submit" value="申請">
        </div>
    </form>
</div>
@endsection
