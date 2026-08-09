<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareProduct extends Model
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
        'description',
        'specs_json',
        'is_custom',
    ];

    protected $casts = [
        'is_custom' => 'boolean',
        'specs_json' => 'array',
    ];
}
