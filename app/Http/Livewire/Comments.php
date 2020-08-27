<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;

class Comments extends Component
{

    public $newComment = '';

    public $comments;

    public function addComment() {
      
        if ($this->newComment == "") {
            return;
        }

        $comment = [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creater' => 'Javed Baloch'
        ];
        
        // Adds at the begining of the Array.
        array_unshift($this->comments, $comment);

        $this->newComment = "";
        
    }

    public function mount() {
        $initialComments = Comment::all();
        $this->comments = $initialComments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
