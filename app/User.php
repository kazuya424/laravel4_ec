<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\UserClassification;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * 関連テーブル設定
     */
    protected $table = 'm_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password',
        'last_name',
        'first_name',
        'zipcode',
        'prefecture',
        'municipality',
        'address',
        'apartments',
        'email',
        'phone_number',
        'user_classification_id',
        'company_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function userClassification()
    {
        return $this->belongsTo(UserClassification::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getZipcodeWithHyphenAttribute() :string
    {
        $zipHigh = substr($this->zipcode, 0, 3);
        $zipLow = substr($this->zipcode, 3, 4);
        return $zipHigh.'-'.$zipLow;
    }

    public function getPhoneNumberWithHypheAttribute() :string
    {
        $telHigh = substr($this->phone_number, 0, 3);
        $telMiddle = substr($this->phone_number, 3, 4);
        $telLow = substr($this->phone_number, 7, 4);
        return $telHigh.'-'.$telMiddle.'-'.$telLow;
    }

    /**
     * フル住所を取得
     *
     * @return string
     */
    public function getFullAddressAttribute() :string
    {
        return $this->prefecture.$this->municipality." ".$this->address.$this->apartments;
    }

    /**
     * フル氏名を取得
     *
     * @return string
     */
    public function getFullNameAttribute() :string
    {
        return $this->last_name." ".$this->first_name;
    }
}
