<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','pharmacy_id','date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
