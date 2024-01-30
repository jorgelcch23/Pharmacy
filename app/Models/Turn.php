<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    protected $fillable = ['date'];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function pharmacy(){
        return $this->belongTo(Pharmacy::class);
    }
}
