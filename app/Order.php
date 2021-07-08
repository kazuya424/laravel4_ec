<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderDetail;

class Order extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 't_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
