<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin Builder
 */

class Guest extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
