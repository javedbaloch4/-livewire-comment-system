<div>
    <div class="flex justify-center">
        <div class="w-10/12">
        
            <h1 class="my-10 text-3xl">Comments</h1>

            @if(session()->has('message'))
                <div class="bg-teal-100 my-5 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Success</p>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <section>
                @if($image)
                    <img src="{{ $image }}" alt="" width="200px"/>
                @endif
                <input type="file" id="image" wire:change="$emit('fileChoosen')">
            </section>

            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror <br />
            <form class="my-4 flex" wire:submit.prevent="addComment">
                <input type="text" wire:model.lazy="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind.">
                <div class="py-2">
                    <button class="p-2 bg-blue-500 w-20 rounded shadow text-white" type="submit">Add</button>
                </div>
            </form>
            
            @foreach ($comments as $comment)
                <div class="rounded border shadow p-3 my-2">
                    <div class="flex justify-between my-2">
                        <div class="flex">
                            <p class="font-bold textlg">{{ $comment->user->name }}</p>
                            <p class="font-semibold mx-3 py-1 text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        
                        </div>
                           
                        <i wire:click="remove({{ $comment->id }})" class="fa fa-times-circle text-red-200 hover:text-red-600 cursor-pointer"></i>
                    </div>
                    <p class="text-gray-800">
                        {{ $comment->body }}
                    </p>
                    @if ($comment->image)
                        <img src="{{ $comment->imagePath }}" alt="" width="100px">
                    @endif
                </div>
            @endforeach

            {{ $comments->links() }}

        </div> 
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById("image");
        let file = inputField.files[0];
        let reader = new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result);
        }

        reader.readAsDataURL(file);
    })
</script>