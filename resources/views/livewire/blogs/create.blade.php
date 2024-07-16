@section('title')
Create Blog
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit="store" enctype="multipart/form-data">

                        <div class="form-group mb-4">

                            <label class="fw-bold">Banner</label>
                            <input type="file" class="form-control @error('banner') is-invalid @enderror" wire:model="banner">

                            <!-- error message untuk title -->
                            @error('banner')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">Judul</label> <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title" placeholder="Masukkan Judul Blog">

                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" wire:model="content" rows="5" placeholder="Masukkan Content Blog"></textarea>

                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <button type="reset" class="btn btn-md btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>