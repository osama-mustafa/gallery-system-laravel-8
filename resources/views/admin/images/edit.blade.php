@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1>Edit Image</h1>
                <hr>
            </div>
            <div class="col-md-6 mt-4">

                {{-- Upload Success Message --}}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('images.update', ['image' => $image]) }}" method="POST">
                    @csrf 
                    @method('PUT')

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
                        <textarea class="form-control" name="description" id="description" cols="6" rows="6">{{ $image->description }}</textarea>
                        <p class="text-danger">
                            <small><sup>*</sup> Description field is optional</small>
                        </p>
                    </div>
                    <div>
                        @foreach ($tags as $tag)
                            <input type="checkbox" name="tags[]" id="{{ $tag->name }}" {{ (in_array($tag->id, $imageTags)) ? 'checked' : '' }} value="{{ $tag->id }}">
                            <label for="{{ $tag->name }}">{{ $tag->name }}</label><br>
                        @endforeach
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>                     
                </form>

            </div>
            <div class="col-md-4 mt-3 ml-3">
                <a href="{{ route('single.image', ['image' => $image->slug]) }}">
                    <img src="{{ asset('img') }}/{{ $image->name }}" alt="" width="300" height="300">
                </a>
            </div>
        </div>
    </div>
    
@endsection