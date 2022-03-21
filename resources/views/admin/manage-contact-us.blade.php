<x-adminlayout>
    @if (session('message'))
        
            <p class="alert alert-success mt-4">{{session('message')}}</p>
        
    @endif
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)                
            <tr>
                <th scope="row">{{$message->id}}</th>
                <td>{{$message->username}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->message}}</td>
                <td><a type="button" href="{{route('update-message',$message->id)}}" class="btn-sm btn-success text-decoration-none">Update</a></td>
                <td><a type="button" href="{{route('delete-message',$message->id)}}" class="btn-sm btn-danger text-decoration-none">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-adminlayout>

