<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class SupportTicket extends Model
{

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
