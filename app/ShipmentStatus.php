<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;

class ShipmentStatus extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_shipment_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shipment_status_name',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
