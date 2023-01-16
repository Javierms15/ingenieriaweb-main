<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use App\User as User;

/**
 * Class Advertisement
 *
 * @property $id
 * @property $address
 * @property $capacity
 * @property $date
 * @property $features
 * @property $images
 * @property $other
 * @property $price
 * @property $user_id
 * @property $failed_at
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Advertisement extends Model
{

    static $rules = [
		'address' => 'required',
		'capacity' => 'required',
		'date' => 'required',
		'features' => 'required',
		'images' => 'required',
		'other' => 'required',
		'price' => 'required',
		'user_id' => 'required',
		'failed_at' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['address','capacity','date','features','images','other','price','user_id','failed_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
/*
    public function scopeDireccion($query,$address){
        if($address){
            return $query -> where('address', 'like', "%address%");
        }
    }

    public function scopePrecio($query,$price){
        if($price){
            return $query -> where('price', 'like', "%price%");
        }
    }

*/
}
