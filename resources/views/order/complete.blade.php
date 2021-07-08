@extends('layouts.app')

@section('title', '購入完了画面')

@section('content')
<div class="container">
    <div class="text-center">
        <h4 class="mt-5">購入完了しました</h4>
    </div>

    <div class="text-center">
        <p class="mt-4">ご購入ありがとうございます！<br>注文番号：{{ $order_detail_number }}</p>
    </div>

    <div class="text-center">
        <a href="/" class="btn btn-primary mt-2">Topに戻る</a>
    </div>
</div>
@endsection
