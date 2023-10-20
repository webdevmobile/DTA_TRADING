<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'type',
        'entry_point',
        'exit_sl',
        'exit_tp',
        'raison_ent',
        'raison_exit',
        'result',
        'montant',
        'lot_size',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imageUrl (): String
    {
        return Storage::disk('public')->url($this->image);
    }
}
