@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>商品情報</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h2>{{ $product->product_name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-right">
            <h2>商品カテゴリ：{{ $product->category->category_name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-left">
            <h2>商品説明</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-left my-3">
            <h2>{{ $product->description }}</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 text-left">
            <h2>価格：{{ number_format($product->price) }}円</h2>
        </div>
    </div>

    <div class="row mt-5" style="justify-content:center">
        <form action="{{ route('cart.add', ['product' => $product]) }}" method="post">
            @csrf
            <div class="input-group">
                <h2>購入個数</h2>
                <input class="form-control col-2" type="number" min="1" name="quantity" required>
                <h2>個</h2>
                <input type="submit" class="btn btn-primary ml-4" value="カートへ">
            </div>
        </form>
    </div>
</div>
@endsection
