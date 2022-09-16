<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content', 'status', 'image'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function created_at_difference()
    {
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diff(Carbon::now())->days;
    } 
}
