<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Post;
use Carbon\Carbon;
class AddPost extends ModalComponent
{
    public $title, $content;
    protected $rules = [
        'title' => 'required',
        'content' => 'required|max:500',
    ];
    public function submit()
    {
        $this->validate();
 
        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->status = 0;
        $post->image = '';
        $post->created_at = Carbon::now();
        $post->updated_at = null;
        $post->save();
        
        $this->closeModalWithEvents([
            Posts::getName() => 'postModified'
        ]);
    }
    public function cancel()
    {
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.add-post');
    }
}
