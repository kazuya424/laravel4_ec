<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class UserClassification extends Model
{
    use SoftDeletes;

    /**
     * 関連テーブル設定
     */
    protected $table = 'm_user_classifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_classification_name',
    ];

    public static function boot()
    {
        parent::boot();

        // 論理削除されたユーザ種別に紐づいているユーザを論理削除
        static::deleted(function ($userClassification) {
            $userClassification->users()->delete();
        });
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
