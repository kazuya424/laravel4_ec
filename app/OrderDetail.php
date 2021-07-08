<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;
use App\ShipmentStatus;

class OrderDetail extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 't_order_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'shipment_status_id',
        'order_detail_number',
        'order_quantity',
        'shipment_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shipmentStatus()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }
}
