<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translated extends Model
{
    use HasFactory;

    protected $table = 'translated';

    protected $fillable = [
        'first_name',
        'username',
        'request_text',
        'command',
        'response_text',
        'language_code',
        'status',
        'log',
    ];
}
