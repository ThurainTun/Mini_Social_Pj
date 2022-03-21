<x-page>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form class="create-post" action="{{ route('create-post-data') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3 text-center">Create Post</h3>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <label class="form-label">Content</label>
                    <div class="input-group">
                        <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Post</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</x-page>

