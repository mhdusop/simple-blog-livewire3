<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        Blog::destroy($id);

        session()->flash('message', 'Data Berhasil Dihapus.');

        return redirect()->route('blogs.index');
    }

    public function render()
    {
        return view('livewire.blogs.index', [
            "blogs" => Blog::latest()->paginate(5)
        ]);
    }
}
