<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CurrentMatch;

class Playing extends Model
{
    protected $fillable = [
        'size',
        'rows',
        'turn',
        'player_01',
        'player_02'
    ];

    public function user () {
        return $this->belongsToMany(User::class);
    }

    public function matches() {
        return $this->belongsTo(CurrentMatch::class);
    }
}
