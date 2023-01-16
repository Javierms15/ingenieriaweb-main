<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\User as User;

class Publicacion extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
        'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','user_id', 'like', 'url', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}