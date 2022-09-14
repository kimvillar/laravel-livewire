<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
class Posts extends Component
{
    use WithPagination;
    public $listeners = ['postModified' => 'render', 'deletePost'=>'destroy'];
    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required|max:10',
    ];
    public function destroy($id){
        Post::find($id)->delete();
        $this->emitSelf('postModified');
    }
    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::paginate(10)
        ]);
    }
}
