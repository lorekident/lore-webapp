<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostManager extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortAsc = true;
    
    public function render()
    {
        $posts = Post::search($this->search)->paginate(10);
        return view('livewire.post-manager', [
            'posts' => $posts
        ]);
    }
}