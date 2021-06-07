@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h1>All Images</h1>
            </div>
            <div class="col-md-10 mt-3">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($images->count() > 0)
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Uploaded by</th>
                                <th scope="col">Uploaded at</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                            <tr>
                                <td>
                                    <a href="{{ route('single.image', ['image' => $image->slug]) }}">
                                        <img src="{{ asset('img') }}/{{ $image->name }}" width="100" height="100" alt="">
                                    </a>

                                </td>
                                <td>
                                    {{ $image->title }}
                                </td>
                                <td>{{ $image->user->name }}</td>
                                <td>{{ $image->created_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('images.edit', ['image' => $image->id]) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('images.destroy', ['image' => $image->id]) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $images->links() }}
                @else 
                    <h3>No Images Uploaded Yet!</h3>
                @endif
            </div>
        </div>

    </div>
    
@endsection