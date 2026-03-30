<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'stepsid',
        'cardsid',
        'description',
        'buttonText',
        'buttonRoute',
        'image'
    ];

    public function steps()
    {
        return $this->hasMany(Steps::class,'serviceid');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'serviceid');
    }
}
