<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AddPost extends ModalComponent
{
    use WithFileUploads;

    public $title, $content, $image;
    protected $rules = [
        'title' => 'required',
        'content' => 'required|max:500',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ];
    public function submit()
    {
        $this->validate();

        $image_path = '';
        if ($this->image != null) {
            $image_path = $this->image->store('post', 'public');
        }
 
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->status = 0;
        $post->image = $image_path ?? null;
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
