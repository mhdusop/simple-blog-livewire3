<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // banner validation
    #[Rule('required', message: 'Masukkan Banner Blog')]
    #[Rule('image', message: 'File Harus Gambar')]
    #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
    public $banner;

    // title validation
    #[Rule('required', message: 'Masukkan Judul Blog')]
    public $title;

    // content validation
    #[Rule('required', message: 'Masukkan content Blog')]
    #[Rule('min:3', message: 'Isi content Blog minimal 3 karakter')]
    public $content;

    public function store()
    {
        $this->validate();

        // store banner
        $this->banner->storeAs('public/blogs', $this->banner->hashName());

        // create blog
        Blog::create([
            'banner' => $this->banner->hashName(),
            'title' => $this->title,
            'content' => $this->content,
        ]);

        // flash message
        session()->flash('message', "Blog berhasil ditambahkan");

        // redirect
        return redirect()->route('blogs.index');
    }

    public function render()
    {
        return view('livewire.blogs.create');
    }
}
