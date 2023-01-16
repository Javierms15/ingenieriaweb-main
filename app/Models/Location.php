<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\User as User;

class Location extends Model
{
    use HasFactory;
    
    static $rules = [
		'advertisement_id' => 'required',
		'lat' => 'required',
		'lng' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['advertisement_id','lng','lat'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
