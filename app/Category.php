<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
