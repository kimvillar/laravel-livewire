<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class EditPost extends ModalComponent
{
    use WithFileUploads;
    public $title, $content, $image, $db_image, $post_id;
    public $updatePost = false;
    public $listeners = ['imageModified' => 'render'];
    // public function mount(Post $post)
    public function mount($id)
    {
        $post_data = Post::findOrFail($id);
        $this->title = $post_data->title;
        $this->content = $post_data->content;
        $this->image = $post_data->image;
        $this->db_image = $post_data->image;
        $this->post_id = $post_data->id;
        $this->updatePost = true;
    }
    public function update()
    {
        $this->validate();

        $post = Post::find($this->post_id);
        $filename = '';
        $image_path = public_path('storage\\'.$post->image);
        if (!empty($this->image)) {
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $filename = $this->image->store('post', 'public');
            $post->image = $filename;
        } 
        
        $post->title = $this->title;
        $post->content = $this->content;
        $post->updated_at = Carbon::now();
        $post->save();

        $this->closeModalWithEvents([
            Posts::getName() => 'postModified'
        ]);
    }
    public function destroyImage()
    {

        $post = Post::find($this->post_id);
        $image_path = public_path('storage\\'.$post->image);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $post->image = '';
        $post->save();

        $this->mount($this->post_id);
        $this->render();
    }
    public function cancel()
    {
        $this->closeModalWithEvents([
            Posts::getName() => 'postModified'
        ]);
    }
    public function render()
    {
        return view('livewire.edit-post');
    }
    protected function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
