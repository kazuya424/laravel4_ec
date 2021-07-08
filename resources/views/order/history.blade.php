@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <h2><span class="panel-heading badge badge-secondary mt-3 mb-2">
                @foreach($idArray as $id)
                @if($id === 'three')
                <a href="{{route('order.all',['id'=>'all'])}}">全ての注文を表示</a>
                @endif

                @if($id === 'all')
                <a href="{{route('order.all',['id'=>'three'])}}">直近3か月の注文を表示</a>
                @endif
                @endforeach
            </span>
        </h2>
        <div class="panel-body">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>注文番号</th>
                    <th>お届け先</th>
                    <th>備考</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        @foreach($order->orderDetails as $orderDetail)
                            @if ($loop->first)
                            {{$orderDetail->order_detail_number}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <p>〒{{$order->user->ZipcodeWithHyphen}}</p>
                        <p>
                            {{$order->user->prefecture}}
                            {{$order->user->municipality}}
                            {{$order->user->address}}
                            {{$order->user->apartments}}
                        </p>
                        <p>
                            {{$order->user->last_name}}
                            {{$order->user->first_name}}
                            様
                        </p>
                    </td>
                    <td>
                        <p>注文日時: {{$order->updated_at->format('Y/m/d')}}</p>
                        <p>注文状態:
                            @foreach($order->orderDetails as $key =>$orderDetail)
                                @if ($loop->first)
                                    @if($orderDetail->shipmentStatus->shipment_status_name==='1')
                                    発送前
                                    @elseif($orderDetail->shipmentStatus->shipment_status_name==='2')
                                    発送中
                                    @else
                                    発送済み
                                    @endif
                                @endif
                            @endforeach
                        </p>
                    </td>
                    <td>
                        <a href="{{ route('order.details', ['order' => $order]) }}" type="submit" name="name" value="詳細" class="btn btn-primary">
                            詳細
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($orders->isEmpty())
        注文履歴は存在しません
        @endif
    </div>
</div>

{{$orders->appends(request()->query())->links()}}

@endsection
