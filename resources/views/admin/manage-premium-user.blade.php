<x-adminlayout>
    @if (session('message'))        
            <p class="alert alert-danger mt-4">{{session('message')}}</p>        
    @endif
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Is Admin</th>
                <th scope="col">Is Premium</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><b>{{$user->isAdmin==0?"FALSE":"TRUE"}}</b></td>
                    <td><b>{{$user->isPremium==0?"FALSE":"TRUE"}}</b></td>
                    <td><a type="button" href="{{route('edit-user',$user->id)}}" class="btn-sm btn-success text-decoration-none">Update</a></td>
                    <td><a type="button" href="{{route('delete-user',$user->id)}}" class="btn-sm btn-danger text-decoration-none" >Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-adminlayout>
