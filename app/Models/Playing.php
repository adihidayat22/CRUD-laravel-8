<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playing extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id', 'start_time', 'score', 'created_at', 'updated_at'
    ];
}
