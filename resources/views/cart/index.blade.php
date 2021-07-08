@extends('layouts.app')

@section('title', '購入完了画面')

@section('content')
<div class="container">

    <div class="col-md-8 col-md-2 mx-auto m-3">
        @if (session('message'))
            <div class="alert alert-danger error">
                {{ session('message') }}
            </div>
        @endif
    </div>


    {{-- お届け先情報 --}}
    @include('cart.address')

    <div class="col-sm-11">
        <table class="table">
            <tr>
                <th>No</th>
                <th>商品名</th>
                <th>商品カテゴリ</th>
                <th>値段</th>
                <th>個数</th>
                <th>小計</th>
            </tr>
            @foreach ($cartProducts as $index => $cartProduct)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cartProduct['product_name'] }}</td>
                <td>{{ $cartProduct['category'] }}</td>
                <td>{{ number_format($cartProduct['price']) }}円</td>
                <td>{{ $cartProduct['session_quantity'] }}<span>個</span></td>
                <td>{{ number_format($cartProduct['subTotal']) }}円</td>
                <td>
                    <form action="{{ route('cart.destroy') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="product_id" value="{{ $cartProduct['session_product_id'] }}">
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>{{ number_format($total) }}円</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="row justify-content-center">
        <a href="{{ route('product.index') }}" class="btn btn-info">買い物を続ける</a>
        <div class="col-4 align-self-center">
        </div>
        <form action="{{ route('order.store') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">注文を確定する</button>
        </form>
    </div>

</div>
@endsection
