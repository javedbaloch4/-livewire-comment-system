<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $newComment = '';

    public function mount() {

    }

    public function addComment() {
      
        $this->validate([
            'newComment' => 'required|max:10'
        ]);

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        $this->newComment = "";
        session()->flash('message', 'Comment has been added.');
    }

    public function remove($id) {
        // $this->comments = $this->comments->where('id', '!=', $id); // Comment Collection
        $comment = Comment::destroy($id);
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
            'comments' => Comment::paginate(2)
        ]);
    }

}