<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin Builder
 */

class Message extends Model
{
    use HasFactory;

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
