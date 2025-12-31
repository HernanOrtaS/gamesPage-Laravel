<?php

namespace App\Livewire\Games;

use App\Models\CurrentMatch;
use App\Models\Playing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCheckersMatch extends Component
{
    public $choosenUser;
    public $users;

    public function mount(){
        $this->checkUsers();
    }

    public function chooseUser ($id) {
        return $this->choosenUser = $id;
    }

    public function checkUsers() {
        $idUser = 0;
        if(Auth::user()){
            $idUser = Auth::user()->id;
        }

        $users = User::select('id','name')
            ->where('id', '!=', $idUser)
            ->get();
        $this->users = $users;
    }

    public function createGame() {
        $rulesPlaying = [
            'size' => 'required|integer|min:4|max:12',
            'rows' => 'required|integer|min:1|max:5',
            'turn' => 'required|boolean',
            'player_01' => 'required',
            'player_02' => 'required',
        ];

        $settingsPlaying = [
            'size' => 8,
            'rows' => 3,
            'turn' => true,
            'player_01' => Auth::id(),
            'player_02' => $this->choosenUser,
        ];

        $validatedPlaying = validator($settingsPlaying, $rulesPlaying)->validate();

        $playing = Playing::create($validatedPlaying);
        
        $this->createMatch($playing->id);
    }

    public function createMatch ($id)
    {
        $rulesMatch = [
            'playingId' => 'required',
            'pieces_player_01' => 'required|array',
            'pieces_player_02' => 'required|array',
        ];

        $settingsMatch = [
            'playingId' => $id,
            'pieces_player_01' => ['a' => '0,1', 'b' => '4,3'],
            'pieces_player_02' => ['a' => '0,1', 'c' => '5,4'],
        ];

        $validatedMatch = validator($settingsMatch, $rulesMatch)->validate();
        CurrentMatch::create($validatedMatch);
    }

    public function render()
    {
        return view('livewire.games.create-checkers-match');
    }
}
