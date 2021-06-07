@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="m-2">Edit Tag</h1>
                <hr>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="col-md-6">
                    <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $tag->name }}">
                            @error('name')
                                <p class="text-danger">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection