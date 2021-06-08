@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1 class="mt-3">Edit Profile</h1>
                <hr>
            </div>
            <div class="col-md-10 mt-3">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('update.profile') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
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
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection