<x-adminlayout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                {{-- action="{{ route('update-message-data',$updateData->id) }}" --}}
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <form class="create-post" action="{{ route('update-user', $users->id) }}" method="POST">
                    @csrf
                    <h3 class="mb-3 text-center">Update User</h3>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="username" value="{{ $users->name }}" type="text" class="form-control"
                            aria-describedby="emailHelp">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" value="{{ $users->email }}" type="email" class="form-control">
                    </div>
                    <label class="form-label">is Admin</label>
                    <select name="isAdmin" class="form-select" aria-label="Default select example">
                        <option value="1" {{$users->isAdmin==1 ? "selected":""}}>True</option>
                        <option value="0" {{$users->isPremium==0 ? "selected":""}}>False</option>
                    </select>
                    <label class="form-label mt-3">is Premium</label>
                    <select name="isPremium" class="form-select" aria-label="Default select example">
                        <option value="1" {{$users->isAdmin==1 ? "selected":""}}>True</option>
                        <option value="0" {{$users->isPremium==0 ? "selected":""}}>False</option>
                    </select>
                    <button type="submit" class="btn btn-danger mt-3 col-3">Update</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</x-adminlayout>
