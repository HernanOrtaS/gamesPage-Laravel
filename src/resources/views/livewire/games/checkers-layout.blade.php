<div>
    <div class="bg-gray-300 w-auto">
        <x-primary-button wire:click="$set('tab', 'home')">Home</x-primary-button>
        @foreach ($games as $game)
            <x-primary-button wire:click="$set('tab', {{ $game->id }})">{{ $game->name_match }}</x-primary-button>
        @endforeach
        <x-primary-button wire:click="$set('tab', 'new')">New Game</x-primary-button>
    </div>
    <div class="">
        @if ($tab == 'home')
            <div>This is the home</div>
            
        @elseif ($tab == 'new')
            <livewire:games.create-checkers-match/>

        @elseif ($tab > 0)
            <div>This is the game {{ $tab }}</div>
        @endif
    </div>
</div>
