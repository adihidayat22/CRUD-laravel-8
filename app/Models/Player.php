<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'nama', 'created_at', 'updated_at'
    ];
}
