<x-adminlayout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form class="create-post" action="{{ route('update-message-data',$updateData->id) }}" method="POST">
                    @csrf
                    <h3 class="mb-3 text-center">Update Message</h3>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="username" value="{{$updateData->username}}" type="text" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" value="{{$updateData->email}}" type="email" class="form-control">
                    </div>
                    <label class="form-label">Content</label>
                    <div class="input-group">
                        <textarea name="message" class="form-control" aria-label="With textarea">{{$updateData->message}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3 col-3">Update</button>
                    
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</x-adminlayout>