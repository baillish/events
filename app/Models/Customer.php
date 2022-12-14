<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'first_name',
        'phonenumber',
        'last_name',
        
    ];

    public function events(){

        return $this->hasMany(Event::class);


    }
}
