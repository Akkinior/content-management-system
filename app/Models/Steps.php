<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    protected $fillable = [
        'stepsName',
        'stepsNumber',
        'stepsDescription',
        'stepsImage',
        'serviceid'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceid');
    }
}
