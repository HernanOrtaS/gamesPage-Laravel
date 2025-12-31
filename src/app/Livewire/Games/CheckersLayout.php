<?php

namespace App\Livewire\Games;

use App\Models\Playing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckersLayout extends Component
{
    public $games = [];
    public $tab = 'home';

    public function mount() 
    {
        $this->getMatch();
    }
    
    public function getMatch()
    {
        $games = Playing::select('name_match', 'id')
            ->where('player_01', Auth::id())
            ->orWhere('player_02', Auth::id())
            ->get();
        $this->games = $games;
    }

    public function render()
    {
        $this->getMatch();
        return view('livewire.games.checkers-layout');
    }
}
