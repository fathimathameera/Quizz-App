<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['score', 'username'];

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y h:i', strtotime($value));
    }
}
