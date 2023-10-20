<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'subname',
        'email',
        'phone',
        'role',
        'city',
        'password'
    ];

    protected $attributes = [
        'role' => 'Secretaire'
    ];
}
