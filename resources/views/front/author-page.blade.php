@extends('front.includes.homepage-layout')

@section('content')

    @include('front.includes.search')


    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Results uploaded by: {{ $user->name }}
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            
            @if ($user->images->count() > 0)
            @foreach ($user->images as $image)
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
        @else 
            <h3 class="text-center">There are no images uploaded by: {{ $user->name }}</h3>
        @endif
            
        </div> <!-- row -->


    </div> <!-- container-fluid, tm-container-content -->

@endsection
