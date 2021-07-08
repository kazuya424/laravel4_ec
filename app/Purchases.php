<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
