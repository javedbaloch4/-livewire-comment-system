<div>
    
    <div class="flex justify-center">

        <div class="w-6/12">
        
            <h1 class="my-10 text-3xl">Comments</h1>

            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror <br />
            <form class="my-4 flex" wire:submit.prevent="addComment">

                <input type="text" wire:model="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind.">
                <div class="py-2">
                    <button class="p-2 bg-blue-500 w-20 rounded shadow text-white" type="submit">Add</button>
                </div>


            </form>

            @foreach ($comments as $comment)
                <div class="rounded border shadow p-3 my-2">
                    <div class="flex justify-start my-2">
                        <p class="font-bold textlg">{{ $comment->user->name }}</p>
                        <p class="font-semibold mx-3 py-1 text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-gray-800">
                        {{ $comment->body }}
                    </p>
                </div>
            @endforeach

        </div> 

    </div>

</div>
