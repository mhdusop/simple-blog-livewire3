@section('title')
Data Blogs
@endsection

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <!-- flash message -->
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <!-- end flash message -->

            <a href="/create" wire:navigate class="btn btn-sm btn-success rounded border-0 mb-3">Add New Blog</a>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Banner</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/blogs/'.$blog->banner) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->content }}</td>
                                <td class="text-center">
                                    <a href="/edit/{{ $blog->id }}" wire:navigate class="btn btn-sm btn-warning">Edit</a>
                                    <button wire:click="destroy({{ $blog->id }})" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Blog belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $blogs->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>