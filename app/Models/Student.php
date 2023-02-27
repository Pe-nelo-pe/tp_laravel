<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //  $fillable - les champs qu'on autorise pour la création ou la modification
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'city_id',
        'phone',
        'birthday',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
