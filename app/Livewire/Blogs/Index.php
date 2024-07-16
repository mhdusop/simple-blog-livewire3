<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blogs.index', [
            "blogs" => Blog::latest()->paginate(5)
        ]);
    }
}
