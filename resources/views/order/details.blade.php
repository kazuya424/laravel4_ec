@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="p-3 border rounded-lg">
        <h3>お届け先</h3>
        @if(isset($user))
        <p>〒
            {{$user->ZipcodeWithHyphen}}
            (
            {{$user->prefecture}}
            {{$user->municipality}}
            {{$user->address}}
            {{$user->apartments}}
            )
        </p>
        @endif
    </div>

    @if(isset($details))
        @foreach($details as $detail)
            @if ($loop->first)
                <div class="py-3">
                    <p>注文番号：
                        {{$detail->order_detail_number}}
                    </p>
                </div>
            @endif

            <div class="text-right px-3 my-3">
                @if($detail->shipment_status_id === 1)
                    @if ($loop->first)
                        <form class="btn btn-sm bg-danger" action="{{route('order.destroy', ['detail' => $detail->order_id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="&#xf1f8; 注文をキャンセルする" class="btn btn-danger" style="border: 0px none; color:white;" onclick='return confirm("削除しますか？");'>
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
    @endif

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">商品名</th>
                <th class="text-center">商品カテゴリー</th>
                <th class="text-center">値段</th>
                <th class="text-center">個数</th>
                <th class="text-center">小計</th>
                <th class="text-center">備考</th>
                <th class="text-center">詳細</th>
            </tr>
        </thead>
        
    @if(isset($orderQuantityMatchs))
        <tbody class="text-center border-bottom">
                @foreach($orderQuantityMatchs as $orderQuantityMatch)
                    @php
                    $total=$orderQuantityMatch->product->price * $orderQuantityMatch->order_quantity;
                    @endphp
                    <tr>
                            <td>{{$orderQuantityMatch->product->id}}</td>
                            <td>{{$orderQuantityMatch->product->product_name}}</td>
                            <td>{{$orderQuantityMatch->product->category->category_name}}</td>
                            <td>{{$orderQuantityMatch->product->price}}</td>
                            <td>{{$orderQuantityMatch->order_quantity}}</td>
                            <td>{{$total}}</td>
                            <td>
                            注文状態：
                            @if($orderQuantityMatch->shipment_status_id === 1)
                                 発送前
                                 @elseif($orderQuantityMatch->shipment_status_id === 2)
                                 発送中
                                 @else
                                 発送済み
                            @endif                           
                            </td>
                            <td><a href="{{ route('product.show', ['id' => $orderQuantityMatch->product_id]) }}" class="btn btn-primary">商品詳細</a></td>
                    </tr>
                @endforeach
        </tbody>
        <tbody class="text-center">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>合計 </td>
                <td>{{$totalPrice}}円</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    @endif
    </table>
    <div class="text-right px-3 my-3">
        <a href="{{route('order.all',['id'=>'all'])}}" class="btn btn-primary">注文履歴に戻る</a>
    </div>
</div>

@endsection
