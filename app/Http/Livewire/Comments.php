<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Comments extends Component
{

    public $newComment = '';

    public $comments = [
        [
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Sequi sunt libero eius maiores necessitatibus ratione voluptatibus quam placeat, 
            porro dolores quisquam tenetur asperiores nam a soluta et ea quis! Alias.',
            'created_at' => '3 min ago',
            'creater' => 'Javed'
        ],
    ];

    public function addComment() {
      
        $comment = [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creater' => 'Javed Baloch'
        ];
        
        // Adds at the begining of the Array.
        array_unshift($this->comments, $comment);
        
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
