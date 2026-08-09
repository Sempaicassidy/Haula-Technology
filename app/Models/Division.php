<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'key',
        'title',
        'icon',
        'status',
        'subtitle',
        'is_custom',
    ];

    protected $casts = [
        'is_custom' => 'boolean',
    ];
}
