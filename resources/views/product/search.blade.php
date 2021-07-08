@extends('layouts.app')

@section('content')

@if (session('message'))
    <div class="alert alert-danger text-center">
        {{ session('message') }}
    </div>
@endif
　
<div class="product">
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>商品検索画面</h1>
        </div>
    </div>
    
    <form class="search" enctype="multipart/form-data" action="{{route('product.index')}}" accept-charset="UTF-8" method="get">
        @csrf
        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2 class="mr-4">商品名</h2>
                <input type="text" name="product_name" class="form-control" value="{{isset($product_name) ? $product_name : "" }}"> 
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary ml-4" value="検索">
                </span>
            </div>
        </div>

        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2>商品カテゴリ</h2>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach(config('categories') as $id => $category)
                    <option name="category_id" value="{{$id}}"　@if ($id === $category_id_int) {{$id}} selected @endif>{{$category}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    
    <div class="container mt-4">
        <div class="panel panel-default">
            <div class="panel-heading">全{{$datas->total()}}件</div>
            <div class="panel-body">
            </div>
            <table border="1" class="table" style="border-collapse: collapse">
                @if(!empty($datas))
                <thead class="bg-warning">
                    <tr>
                        <th>商品名</th>
                        <th>商品化カテゴリ</th>
                        <th>価格</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->product_name}}</td>
                        <td>{{ $data->category->category_name}}</td>
                        <td>{{ $data->price}}円</td>
                        <td><a href="{{ route('product.show', ['id' => $data->id]) }}" class="btn btn-primary">商品詳細</a></td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
                @if($datas->isEmpty())
                検索結果がありませんでした。
                @endif
            {{ $datas->fragment('foo')->links() }}
        </div>
    </div> 　
</div>
@endsection
