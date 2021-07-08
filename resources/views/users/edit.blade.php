@extends('layouts.app')

@section('content')

<div class="container">
  @include('users.user_error')
    <h1 class="text-center py-5">ユーザー情報修正</h1>
    <form class="form-group" action="{{ route('user.postEdit',$user->id) }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
      <input type="hidden" name="id" value="{{$user->id}}" />
      {{ csrf_field() }}
      {{ method_field('put') }}
      
      <div class="form-group row">
        <label class="col-sm-2 text-sm-center offset-sm-1">氏名</label>
        <label class="col-sm-1 text-sm-right col-2 col-form-label">姓</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$user->last_name) }}" placeholder="◯◯">
        </div>
        <label class="col-sm-1 text-sm-right col-2 col-form-label">名</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name="first_name" value="{{ old('first_name',$user->first_name) }}" placeholder="XX">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 text-sm-center col-12 col-form-label offset-sm-1">住所</label>
        <label class="col-sm-1 text-right col-2 col-form-label">〒</label>
        <div class="col-sm-3 col-8">
          <input type="text" class="form-control"  name="zipcode" value="{{ old('zipcode',$user->zipcode) }}" placeholder="0000000">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-right">都道府県</label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="prefecture" value="{{ old('prefecture',$user->prefecture) }}" placeholder="富山県">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-right">市町村区</label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="municipality" value="{{ old('municipality',$user->municipality) }}" placeholder="南〇市">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-right">番地</label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="address" value="{{ old('address',$user->address) }}" placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-right">マンション部屋番号</label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="apartment" value="{{ old('apartment',$user->apartment) }}"　placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">メールアドレス</label>
        <div class="col-sm-6">
          <input type="text" class="form-control"  name="email" value="{{ old('email',$user->email) }}" placeholder="email@example.com">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">電話番号</label>
        <div class="col-sm-6">
          <input type="text" class="form-control"  name="phone_number" value="{{ old('phone_number',$user->phone_number) }}" placeholder="〇〇〇〇〇〇〇〇〇〇">
        </div>
      </div>
      <div class="d-flex justify-content-around py-5 col-sm-8 col-auto container">
      <input type="submit" name="submit" value="修正" class="btn btn-primary px-2">
    </form>
    
    <form class="form-group-row" action="{{ route('user.destroy',$user->id)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <input type="submit" name="submit" value="退会" class="btn btn-danger px-2">  
    </form>
    </div>
  </div>

  @endsection