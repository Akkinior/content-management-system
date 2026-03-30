<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name',
        'description',
        'serviceid'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class ,'serviceid');
    }
}
