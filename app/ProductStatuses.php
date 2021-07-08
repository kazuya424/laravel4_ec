<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatuses extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_product_statuses';

    protected $fillable = [
        'product_status_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
