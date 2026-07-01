<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = [
        'task',
        'des',
        'status',
        'user_id',
        'com',
        'fav',
    ];
    public function user()
    {
        return $this->blongsto(User::class);
    }
}
