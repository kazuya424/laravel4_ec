<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller
{
    /**
     * 商品検索
     * @return $datas
     */
    public function index(Request $request)
    {
        $query = Product::query();

        $product_name = $request->product_name;
        $category_id = $request->category_id;

        //商品名の値が存在&商品名の値が空ではなかった場合
        if ($request->has('product_name') && $product_name !== '') {
            $query->where('product_name', 'like', '%' . $product_name . '%')->get();
        }

        //カテゴリーの値が存在&カテゴリーの値が0ではなかった場合
        if ($request->has('category_id') && $category_id !== '0') {
            $query->where('category_id', $category_id)->get();
        }

        $datas = $query->paginate(15);

        //型変換
        $category_id_int = intval($category_id);

        return view('product.search', ['datas' => $datas, 'product_name' => $product_name, 'category_id_int' => $category_id_int]);
    }
    
    /**
     * 商品詳細画面
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return view('product.error');
        }

        return view('product.show', ['product' => $product]);
    }
}
