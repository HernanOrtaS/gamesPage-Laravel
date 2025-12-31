<div>
    <div>Challenge a user</div>
    <select wire:change="chooseUser($event.target.value)">
        <option>-- Select a username --</option>
        @forelse ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @empty
            <option value="0">Theres no logged users</option>
        @endforelse
    </select>
    @if ($choosenUser)
        <button wire:click="createGame()">Create Match</button>
    @endif
</div>
