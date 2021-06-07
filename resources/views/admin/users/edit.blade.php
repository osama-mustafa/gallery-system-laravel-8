@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1 class="mt-3">Edit User</h1>
                <hr>
            </div>
            <div class="col-md-10 mt-3">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div>
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection