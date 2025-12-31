<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Playing;

class CurrentMatch extends Model
{
    protected $fillable = [
        'playingId',
        'pieces_player_01',
        'pieces_player_02'
    ];

    protected $casts = [
        'pieces_player_01' => 'array',
        'pieces_player_02' => 'array',
    ];

    public function playing () {
        return $this->hasOne(Playing::class);
    }

}
