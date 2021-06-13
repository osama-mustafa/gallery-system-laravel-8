
@extends('admin.includes.admin-layout')

@section('content')
    <div class="container">
        <div class="row mt-3">
            @if (auth()->user()->admin == true)    
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><i class="fas fa-users"></i> Users: {{ $users->count() }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('users.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>  

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><i class="fas fa-images"></i> Images: {{ $images->count() }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('images.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> 
                
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><i class="fas fa-tags"></i> Tags: {{ $tags->count() }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('tags.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>  

            @endif

            @if (auth()->user()->admin == false) 
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><i class="fas fa-images"></i> Images: {{ $userImages->count() }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('profile.images') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> 
            </div>
                <div class="col-xl-3 col-md-6">
                    <h4>
                        <a href="{{ route('images.create') }}" class="btn btn-secondary">Upload now</a>
                    </h4>    
                </div>
            @endif
        </div>
    </div>
@endsection