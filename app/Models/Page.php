<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 
        'slug', 
        'body', 
        'status', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
