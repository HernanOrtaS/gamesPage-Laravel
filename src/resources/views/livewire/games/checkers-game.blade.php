<div>
    <div class="bg-gray-400 p-4">
        <div class="bg-red-300 p-4">
            @if ($playing)
            <table class="border-8 border-amber-800">
            @for ($i = 0; $i < 8 ; $i++)
            @php
                $k = $i % 2 ? 0 : 1;
            @endphp
                <tr>
                @for ($j = 0 + $k; $j < 8 + $k; $j++)
                    <td class="bg-gray-{{ $j % 2  ? '100' : '800'}} w-16 h-16 text-center 
                    {{ $movesAvaliable ? (($movesAvaliable[0][0] == $i && $movesAvaliable[0][1] == $j - $k) || 
                    ($movesAvaliable[1][0] == $i && $movesAvaliable[1][1] == $j - $k) ? 'hover:bg-green-500' : '') : '' }}">
                        @foreach ($starting as $piece)
                            @if ($i == $piece[0] && $j - $k == $piece[1])
                                <button wire:click="checkMoves([{{ $i }}, {{ $j - $k }}])" wire:click="$set('currentPiece', [{{ $i }}, {{ $j - $k }}])" 
                                class="bg-gray-400 rounded-full w-5 p-5 border-gray-700 border-b-2 border-r-2 hover:bg-gray-500 place-items-center focus:ring-8"></button>
                            @endif
                        @endforeach
                        </div>
                    </td>
                @endfor
                </tr>
            @endfor
            </table>
            <div>
                @foreach ($currentPiece as $text)
                    {{ $text }}
                @endforeach
            </div>
            @else
                <div>Theres no games currently
                </div>
                <div>
                    @if ($newMatch)
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
                            <button wire:click="createMatch()">Create Match</button>
                        @endif
                    @else
                        <button wire:click="match()" class="bg-green-400">
                            New match
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>