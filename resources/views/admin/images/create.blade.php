@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h1>Upload Image</h1>
                <hr>
            </div>
            <div class="col-md-6 mt-1">

                {{-- Upload Success Message --}}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('POST')

                    <div class="mb-3 form-group">
                        <label for="">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="formFile" name="title" value="{{ old('title') }}" required>
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
                        <textarea class="form-control" name="description" id="description" cols="6" rows="5">{{ old('description') }}</textarea>
                        <p class="text-danger">
                            <small><sup>*</sup>Description field is optional</small>
                        </p>
                    </div>

                    <div class="mb-3 form-group">
                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" required>
                    </div>
                    @error('file')
                        <p class="text-danger">
                            <small>
                                {{ $message }}
                            </small>
                        </p>
                    @enderror

                    <h5 class="mt-1">Tags</h5>
                    @if ($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <input type="checkbox" name="tags[]" id="{{ $tag->id }}" value="{{ $tag->id }}">
                            <label for="{{ $tag->name }}">{{ $tag->name }}</label><br>
                        @endforeach
                    @endif

                    <button class="btn btn-success mt-3">Upload</button>
                                       
                </form>
                
            </div>

        </div>
    </div>
    
@endsection