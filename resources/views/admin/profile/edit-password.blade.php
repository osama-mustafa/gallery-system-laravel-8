@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1 class="mt-3">Edit Password</h1>
                <hr>
            </div>
            <div class="col-md-10 mt-3">

                {{-- Success Message --}}
                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error_message'))
                    <div class="alert alert-danger">
                        {{ session('error_message') }}
                    </div>
                @endif

                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" name="newpassword" class="form-control @error('newpassword') is-invalid @enderror">
                        @error('newpassword')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="newpassword_confirmation">Confirm New Password</label>
                        <input type="password" name="newpassword_confirmation" class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection