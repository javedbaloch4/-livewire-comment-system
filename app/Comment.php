<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    protected $fillable = ['body','user_id','image','support_ticket_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImagePathAttribute() {
        return Storage::disk('public')->url($this->image);
    }
}
