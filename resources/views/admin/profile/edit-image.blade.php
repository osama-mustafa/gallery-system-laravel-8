@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1>Edit Image</h1>
                <hr>
            </div>
            <div class="col-md-8 mt-4">

                {{-- Update Success Message --}}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('update.own.image', ['image' => $image]) }}" method="POST">
                    @csrf 
                    @method('POST')

                    <div class="mb-3 form-group">
                        <label for="">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="formFile" name="title" value="{{ $image->title }}" required>
                        @error('title')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $image->description }}</textarea>
                        <p class="text-danger">
                            <small><sup>*</sup> Description field is optional</small>
                        </p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>                     
                </form>

            </div>
            <div class="col-md-4 mt-3">
                <img src="{{ asset('img') }}/{{ $image->name }}" alt="" width="300" height="300">
            </div>
        </div>
    </div>
    
@endsection