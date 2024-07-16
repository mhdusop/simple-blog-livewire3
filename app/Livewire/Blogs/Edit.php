<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    // id blogs
    public $blogId;

    // banner
    public $banner;

    // title
    #[Rule('required', message: 'Masukkan Judul Blog')]
    public $title;

    // content
    #[Rule('required', message: 'Masukkan Isi Blog')]
    #[Rule('min:3', message: 'Isi content Blog minimal 3 karakter')]
    public $content;

    public function mount($id)
    {
        // get blog
        $blog = Blog::find($id);

        //assign
        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->content = $blog->content;
    }

    public function update()
    {
        $this->validate();

        // get blog
        $blog = Blog::find($this->blogId);

        //check if banner
        if ($this->banner) {

            //store banner in storage/app/public/blogs
            $this->banner->storeAs('public/blogs', $this->banner->hashName());

            //update blog
            $blog->update([
                'banner' => $this->banner->hashName(),
                'title' => $this->title,
                'content' => $this->content,
            ]);
        } else {

            //update blog
            $blog->update([
                'title' => $this->title,
                'content' => $this->content,
            ]);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('blogs.index');
    }

    public function render()
    {
        return view('livewire.blogs.edit');
    }
}
