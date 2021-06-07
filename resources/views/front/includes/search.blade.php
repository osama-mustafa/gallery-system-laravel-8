
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset('img/hero.jpg') }}">
    <form class="d-flex tm-search-form" action="{{ route('search.page') }}" method="POST">
        @csrf 
        @method('POST')
        <input class="form-control tm-search-input" type="search" name="search" placeholder="Search" aria-label="Search" required>
        <button class="btn btn-outline-success tm-search-btn" name="submit" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

