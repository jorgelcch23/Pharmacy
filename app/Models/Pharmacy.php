<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'gps', 'location'];

    public function Turns(){
        return $this->hasMany(Turn::class);
    }
}
