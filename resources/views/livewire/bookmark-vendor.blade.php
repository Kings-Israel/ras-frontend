<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <span class="icon-heart">
        @if($isBookmarked)
           <i wire:click="bookmark" class="fas fa-heart text-red-600 mt-1 font-thin hover:cursor-pointer"></i>
        @else
           <i wire:click="bookmark" class="far fa-heart mt-1 font-thin hover:cursor-pointer"></i>
        @endif
     </span>
</div>
