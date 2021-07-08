@extends('layouts.app')

@section('title', 'カート内商品なし')

@section('content')
<div class="container">

    {{-- お届け先情報 --}}
    @include('cart.address')

    <div class="text-center">
        <h3 class="p-5">カート内に商品はありません</h3>
    </div>
</div>
@endsection
