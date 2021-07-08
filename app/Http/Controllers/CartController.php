<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($request->session()->has('cartProducts')) {
            $cartProducts = $request->session()->get('cartProducts');
        }

        // カートが空の場合、空画面へ遷移
        if (empty($cartProducts)) {
            return view('cart.error', ['user' => $user]);
        }

        // カート内商品情報を取得
        $sessionProductIds = array_column($cartProducts, 'session_product_id');
        $products = Product::find($sessionProductIds);

        foreach ($cartProducts as $index => $cartProduct) {
            foreach ($products as $product) {
                if ($cartProduct['session_product_id'] == $product->id) {
                    $cartProducts[$index]['product_name'] = $product->product_name;
                    $cartProducts[$index]['category'] = $product->category->category_name;
                    $cartProducts[$index]['price'] = $product->price;
                    $cartProducts[$index]['subTotal'] = (int)$product->price * (int)$cartProduct['session_quantity'];
                    break;
                }
            }
        }

        // 合計
        $total = array_sum(array_column($cartProducts, 'subTotal'));

        return view('cart.index', compact('user', 'cartProducts', 'total'));
    }

    public function add(Product $product, CartAddRequest $request)
    {
        $cartProduct = [
            'session_product_id' => $product->id,
            'session_quantity' => (int)$request->quantity,
        ];

        // カート内に商品が存在する場合
        if ($request->session()->has('cartProducts')) {
            // カート内商品情報を取得
            $sessionCartProducts = $request->session()->get('cartProducts');

            // 同一商品存在判定フラグ
            $isSameProduct = false;

            foreach ($sessionCartProducts as $index => $sessionCartProduct) {
                // 同一商品が存在する場合
                if ($product->id == $sessionCartProduct['session_product_id']) {
                    // 個数を合算して、セッションに保存
                    $sessionQuantity = (int)$sessionCartProduct['session_quantity'] + (int)$request->quantity;
                    $request->session()->put('cartProducts.'.$index.'.session_quantity', $sessionQuantity);
                    $isSameProduct = true;
                    break;
                }
            }

            // 同一商品が存在しない場合
            if (!$isSameProduct) {
                // セッションに商品を追加
                $request->session()->push('cartProducts', $cartProduct);
            }
        }

        // カート内に商品が存在しない場合
        if (!$request->session()->has('cartProducts')) {
            // セッションに商品を追加
            $request->session()->push('cartProducts', $cartProduct);
        }

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        // カート内商品情報を取得
        $cartProducts = $request->session()->get('cartProducts');

        $deleteProducts = [
            [
                'session_product_id' => $request->product_id,
            ],
        ];

        $deletedCartProducts = array_udiff($cartProducts, $deleteProducts, function ($cartProduct, $deleteProduct) {
            // セッション商品idで比較し、重複する場合は削除
            return $cartProduct['session_product_id'] - $deleteProduct['session_product_id'];
        });

        $request->session()->put('cartProducts', $deletedCartProducts);

        return redirect()->route('cart.index');
    }
}
