<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
