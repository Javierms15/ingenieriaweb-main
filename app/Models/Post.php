<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use App\User as User;

/**
 * Class Booking
 *
 * @property $id
 * @property $user_id
 * @property $advertisement_id
 * @property $date_in
 * @property $date_out
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'advertisement_id' => 'required',
		'comment' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','advertisement_id','comment','like'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }

    



}
