<x-page>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('img/profiles/'.auth()->user()->image) }}" class="rounded-circle" width="150" height="150">
                                <div class="mt-3">
                                    <h4>{{auth()->user()->name}}</h4>                                    
                                    <p class="">{{auth()->user()->bio}}</p>
                                    <a href="{{route('create-post')}}">
                                        <button class="btn btn-danger">Create Post</button>
                                    </a>
                                    {{-- auth()->user()->image --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="">
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{auth()->user()->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{auth()->user()->email}}
                                    </div>
                                </div>                                                        
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{auth()->user()->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{auth()->user()->address}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <a class="btn btn-danger " href="{{route('edit-user-profile')}}">Edit Profile</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="btn btn-danger " href="{{route('logout')}}">Logout</a>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-page>

