<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Post;
use Carbon\Carbon;

class EditPost extends ModalComponent
{
    public Post $post;
    protected $rules = [
        'title' => 'required',
        'content' => 'required|max:500',
    ];
    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function update()
    {
        $this->validate();
 
        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->updated_at = Carbon::now();
        $this->post->save();

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
        return view('livewire.edit-post');
    }
}
