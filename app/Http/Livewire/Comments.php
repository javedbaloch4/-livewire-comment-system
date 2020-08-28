<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;

class Comments extends Component
{

    public $newComment = '';

    public $comments;

    public function mount() {

        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;
    }


    public function addComment() {
      
        $this->validate([
            'newComment' => 'required|max:10'
        ]);

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        $this->comments->prepend($createdComment);

        $this->newComment = "";
        
    }

    public function remove($id) {
        // $this->comments = $this->comments->where('id', '!=', $id); // Comment Collection
        $this->comments = $this->comments->except($id);
        $comment = Comment::destroy($id);
    }

    public function updated($field) {

        $this->validateOnly($field, [
            'newComment' => 'required|max:10'
        ]);
    
    }

    public function render()
    {
        return view('livewire.comments');
    }

}