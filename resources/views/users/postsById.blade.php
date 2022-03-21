<x-page>
    <div class="container ct-size d-flex justify-content-center mt-4">
        <img src="{{ asset('img/posts/' . $post->image) }}" alt="" width="100%">
    </div>
    <div class="container ct-size d-flex justify-content-center mt-4">
        <p class="text-white">{{ $post->content }}</p>
    </div>
    @can('premiumAdminPostowner', $post->id)        
    <div class="text-center mt-3 mb-5">
        <a href="{{ route('postsUpdate', $post->id) }}" class="btn btn-success">Edit Post</a>
        <a href="{{ route('postsDelete', $post->id) }}" class="btn btn-danger">Delete Post</a>
    </div>
    @endcan
</x-page>
