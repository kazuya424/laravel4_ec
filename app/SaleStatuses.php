<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStatuses extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_sale_statuses';

    protected $fillable = [
        'sale_status_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
