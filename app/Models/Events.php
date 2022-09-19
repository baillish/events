<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventname',
        'location',
        'customer_id',
        
        
    ];

    public function customers (){
        return $this->belongsTo(Customer::class);
    }
}
