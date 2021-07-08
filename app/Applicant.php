<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * 関連テーブル設定
     */
    protected $table = 'm_applicants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'auth_code',
    ];
}
