@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1>All Users</h1>
            </div>
            <div class="col-md-10 mt-3">

                {{-- Upload Success Message --}}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            
                {{-- @if (empty($images)) --}}
                @if ($users->count() > 0)
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Images</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin Status</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('author.page', ['author' => $user->name]) }}">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->images->count() }}</td>
                                <td>
                                    @if ($user->admin == true)
                                        {{ 'Admin' }}
                                    @else 
                                        {{ 'Subscriber' }}
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td> 
                                    @if ($user->admin == true)
                                        <form action="{{ route('remove.from.admin', ['user' => $user]) }}" method="POST">
                                            @csrf 
                                            @method('POST')
                                            <button type="submit" class="btn btn-secondary">Make as Subscriber</button>
                                        </form>
                                    @else 
                                        <form action="{{ route('make.admin', ['user' => $user]) }}" method="POST">
                                            @csrf 
                                            @method('POST')
                                            <button type="submit" class="btn btn-danger">Make as Admin</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row m-4 d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                @else 
                    <h3>No Users Found!</h3>
                @endif
            </div>
        </div>

    </div>
    
@endsection