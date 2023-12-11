<div>
    <span class="icon-heart">
        @if($isBookmarked)
           <i wire:click="bookmark" class="fas fa-bookmark py-2 px-2 font-thin bg-primary-one hover:cursor-pointer rounded-md"></i>
        @else
           <i wire:click="bookmark" class="fas fa-bookmark font-thin bg-white py-2 px-2 hover:cursor-pointer rounded-md"></i>
        @endif
     </span>
</div>
