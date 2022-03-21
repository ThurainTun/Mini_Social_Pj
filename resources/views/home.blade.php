<x-page>
    <div class="container mt-4 ">
        <div class="row ">
            @foreach ($posts as $post)
                <div class="col-4 mb-4 justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/posts/' . $post->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h4 class="card-title">{{ $post->title }}</h4>

                            <h6 class="card-text" class="mt-4">( posted by {{$post->user->name}} )</h6>
                            <a href="{{ route('postsById', $post->id) }}" class="btn btn-danger mt-2">Show more</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$posts->links()}}
        </div>
    </div>
</x-page>

