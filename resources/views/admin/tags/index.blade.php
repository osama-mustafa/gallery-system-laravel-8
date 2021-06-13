@extends('admin.includes.admin-layout')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="mt-3">All Tags</h1>

            <div class="col-md-5 mt-3">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            
                @if ($tags->count() > 0)
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else 
                    <h3 class="mb-3">No Tags Found!</h3>
                @endif

            
            </div>
            <div class="col-md-5 mt-3 ml-3">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf 
                    @method('POST')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="for example: cat, car ..." >
                        @error('name')
                            <p class="text-danger">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
    
@endsection