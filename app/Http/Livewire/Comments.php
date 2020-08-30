<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str; 

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $newComment = '';
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData) {
        $this->image = $imageData;
    }

    public function storeImage() {
        if (!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
       
        return $name;
    }

    public function addComment() {
      
        $this->validate([
            'newComment' => 'required|max:10'
        ]);

        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment, 
            'image' => $image,
            'user_id' => 1
        ]);

        $this->newComment = "";
        $this->image = "";
        session()->flash('message', 'Comment has been added.');
    }

    public function remove($id) {
        // $this->comments = $this->comments->where('id', '!=', $id); // Comment Collection
        $comment = Comment::find($id);
        $comment->delete();
        Storage::disk('public')->delete($comment->image);
        session()->flash('message','Comment has been deleted.');

    }

    public function updated($field) {

        $this->validateOnly($field, [
            'newComment' => 'required|max:10'
        ]);
    
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::paginate(11)
        ]);
    }

}