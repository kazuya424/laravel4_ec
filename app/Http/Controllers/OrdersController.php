<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * 注文履歴処理
     *
     */
    public function index($id)
    {
        $idArray = array('id' => $id);

        $user=Auth::id();
        if ($id === 'three') {
            $carbon = new Carbon();
            $now = $carbon->now();
            $threeMonth = $carbon->subMonth(3);

            $orders = Order::where('user_id', $user)
                ->whereBetween('updated_at', [$threeMonth, $now])
                ->with(['user', 'orderDetails.shipmentStatus'])
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('order.history', ['orders' => $orders, 'idArray' => $idArray]);
        } else {
            $orders = Order::where('user_id', $user)
                ->with(['user', 'orderDetails.shipmentStatus'])
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('order.history', ['orders' => $orders, 'idArray' => $idArray]);
        }
    }
    /**
     * 注文情報保存処理
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // カート情報が存在しない場合
        if (!$request->session()->has('cartProducts')) {
            return redirect()->route('cart.index');
        }

        // カート内商品情報を取得
        $cartProducts = $request->session()->get('cartProducts');

        // カート内商品情報が存在しない場合
        if (empty($cartProducts)) {
            $request->session()->forget('cartProducts');
            return redirect()->route('cart.index');
        }

        DB::beginTransaction();

        try {
            // 注文情報をDBに保存
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);

            // 注文番号取得
            $orderDetailNumber = $this->getOrderDetailNumber(Auth::id());

            // 注文詳細情報をDBに保存
            $orderDetail = new OrderDetail();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->create([
                    'order_id' => $order->id,
                    'product_id' => $cartProduct['session_product_id'],
                    'shipment_status_id' => config('consts.common.SHIPMENT_STATUSES.before_shipping.value'),
                    'order_detail_number' => $orderDetailNumber,
                    'order_quantity' => $cartProduct['session_quantity'],
                ]);
            }

            DB::commit();

            // カート内商品情報を削除
            $request->session()->forget('cartProducts');

            return view('order.complete', ['order_detail_number' => $orderDetailNumber]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('message', '注文に失敗しました。お手数ですがお時間を空けてから再度お試しください。');
        }
    }

    /**
     * 注文番号生成
     *
     * @return string
     */
    private function getOrderDetailNumber($user_id) :string
    {
        return str_pad($user_id, 10, '0', STR_PAD_LEFT)."-".date('YmdHis');
    }

    /**
     * 商品詳細
     *
     */
    public function details($id)
    {
        $order = Order::findOrFail($id);

        //注文詳細
        $details = $order->orderDetails;
        foreach ($details as $detail) {
            $product_id = $detail->product_id;
            $order_quantity = $detail->order_quantity;
            $order_detail_number = $detail->order_detail_number;
        }

        //ユーザーIDと注文番号で一致している注文詳細表示
        $orderQuantityMatchs = OrderDetail::where('order_detail_number', $order_detail_number)
            ->with('product')
            ->get();

        // 合計
        $totalPrice = 0;
        foreach ($orderQuantityMatchs as $orderQuantityMatch) {
                $price = $orderQuantityMatch->product['price'];
                $order_quantity = $orderQuantityMatch['order_quantity'];
                $total = $price * $order_quantity;
                $totalPrice += $total;
        }

        //ユーザー
        $user = $order->user;

        return view('order.details', ['user' => $user, 'details' => $details, 'orderQuantityMatchs' => $orderQuantityMatchs, 'totalPrice' => $totalPrice]);
    }

    /**
     * 注文キャンセル
     *
     */
    public function destroy($id)
    {
        //注文id取得
        $order = Order::findOrFail($id);

        //削除
        $order->delete();
        
        return redirect()->action('OrdersController@index', ['id' => 'all']);
    }
}
