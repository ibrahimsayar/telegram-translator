<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translated extends Model
{
    use HasFactory;

    protected $table = 'translated';

    protected $fillable = [
        'request',
        'response',
        'language_code',
        'status',
    ];
}
