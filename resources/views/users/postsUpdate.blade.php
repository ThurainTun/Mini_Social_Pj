<x-page>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form class="create-post" action="{{route('postsUpdateData',$updateData->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3 text-center">Edit Post</h3>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" value="{{$updateData->title}}" type="text" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input name="image" value="{{$updateData->image}}" type="file" class="form-control">
                    </div>
                    <label class="form-label">Content</label>
                    <div class="input-group" >
                        <textarea name="content" class="form-control" aria-label="With textarea">
                            {{$updateData->content}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Update</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</x-page>

