<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'session_id'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
