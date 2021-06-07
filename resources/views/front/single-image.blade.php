@extends('front.includes.homepage-layout')


@section('content')
    
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">{{ $image->title }}</h2>
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="{{ asset('img') }}/{{ $image->name }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">

                    <form action="{{ route('download.image', ['image' => $image->name]) }}" method="POST">
                        @csrf 
                        @method('POST')
                        <div class="text-center mb-5">
                            <a href="{{ route('download.image', ['image' => $image->name]) }}" class="btn btn-primary tm-btn-big"><i class="fas fa-download"></i> Free Download</a>
                        </div>      
                    </form>

                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark mb-3">License</h4>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                    </div>
                                      
                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary"> {{ $imageDimensions[0] }} x {{ $imageDimensions[1] }} </span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">{{ image_type_to_mime_type($imageDimensions[2]) }}</span>
                        </div>
                    </div>
                    <div>
                        <h4 class="tm-text-gray-dark mb-3">Tags</h4>
                        @if ($image->tags->count() > 0)
                            @foreach ($image->tags as $tag)
                                <a href="{{ route('tag.images', ['tag' => $tag->name]) }}" class="tm-text-primary mr-4 mb-2 d-inline-block">{{ $tag->name }}</a>
                            @endforeach
                        @else 
                            <p>There are no tags assigned with image</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark mt-3">Uploaded By</h4>
                        <p>{{ $image->user->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark mt-3">Description</h4>
                        <p>{{ $image->description != null ? $image->description : 'No Description Added!'  }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark mt-3">Views</h4>
                        <p>{{ $image->view_count  }}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                May be interested with
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @if ($relatedImages->count() > 0)
            @foreach ($relatedImages as $image)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset('img') }}/{{ $image->name }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $image->title }}</h2>
                            <a href="{{ route('single.image', ['image' => $image->slug]) }}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ $image->created_at->toDateString() }}</span>
                        <span>{{ $image->view_count }} views</span>
                    </div>
                </div>
            @endforeach
            @endif
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->
@endsection