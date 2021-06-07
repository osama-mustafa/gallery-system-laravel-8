
@include('admin.includes.header')

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                   
                     



                    @if (auth()->user()->admin == true)

                        {{-- Users Section --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                            <div class="sb-nav-link-icon"><i class="mr-2 fas fa-users"></i>
                            Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('users.index') }}">All Users</a>
                                <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
                            </nav>
                        </div>

                           {{-- Image Section --}}
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseImages" aria-expanded="false" aria-controls="collapseImages">
                                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                                Images
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        <div class="collapse" id="collapseImages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('images.create') }}"><i class="mr-2 fas fa-upload"></i> Upload Image</a>
                                <a class="nav-link" href="{{ route('images.index') }}"><i class="mr-2 fas fa-images"></i> All Images</a>
                                <a class="nav-link" href="{{ route('trashed.images') }}"><i class="fas mr-1 fa-trash"></i> Trashed Images</a>
                            </nav>
                        </div>

                        {{-- Tags Section --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTags" aria-expanded="false" aria-controls="collapseTags">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Tags
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTags" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('tags.index') }}">All Tags</a>
                            </nav>
                        </div>
                        
                        
                    @endif                    

                    {{-- Profile Section --}}
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Profile
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseProfile" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('profile.images') }}"><i class="mr-2 fas fa-images"></i> My Images</a>
                            <a class="nav-link" href="{{ route('edit.profile') }}"><i class="mr-2 fas fa-user-cog"></i> Settings</a>
                            <a class="nav-link" href="{{ route('edit.password') }}"><i class="mr-2 fas fa-key"></i> Edit Password</a>
                        </nav>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>


@include('admin.includes.footer')
