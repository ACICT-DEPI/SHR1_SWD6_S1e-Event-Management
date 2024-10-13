<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function citys(){
        return $this->hasMany(City::class);
    }
    public function events() {
        return $this->hasMany(Event::class);
    }
}
