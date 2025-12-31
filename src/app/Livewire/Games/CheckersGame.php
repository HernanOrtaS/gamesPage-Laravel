<?php

namespace App\Livewire\Games;

use App\Models\CurrentMatch;
use App\Models\Playing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckersGame extends Component
{
    public $starting = [
        [0, 1], [0, 3], [0, 5], [0, 7],
        [1, 0], [1, 2], [1, 4], [1, 6],
        [2, 1], [2, 3], [2, 5], [2, 7],
        [5, 0], [5, 2], [5, 4], [5, 6],
        [6, 1], [6, 3], [6, 5], [6, 7],
        [7, 0], [7, 2], [7, 4], [7, 6],
    ];

    public $playing = false;
    public $newMatch = false;

    public $movesAvaliable = [];

    public $currentPiece = [];


    public function checkMoves($currentPiece){
        if ($currentPiece) {
            $movesAvaliable = [];
            $posibleMoves = [
                [$currentPiece[0] - 1,
                $currentPiece[1] - 1,],

                [$currentPiece[0] - 1,
                $currentPiece[1] + 1,],
            ];

            if (!(($posibleMoves[0][0] < 0 || $posibleMoves[0][0] > 7) && 
            ($posibleMoves[0][1] < 0 || $posibleMoves[0][1] > 7))) {
                $movesAvaliable[] = [$posibleMoves[0][0], $posibleMoves[0][1]];
            }

            if (!(($posibleMoves[1][0] < 0 || $posibleMoves[1][0] > 7) && 
            ($posibleMoves[1][1] < 0 || $posibleMoves[1][1] > 7))) {
                $movesAvaliable[] = [$posibleMoves[1][0], $posibleMoves[1][1]];
            }

            $this->movesAvaliable = $movesAvaliable;
        }
    }


    public function match() {
        $this->checkUsers();
        $this->newMatch = true;
    }


    public function render()
    {
        return view('livewire.games.checkers-game');
    }
}
