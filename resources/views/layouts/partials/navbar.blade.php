<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="/">CDIS APP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ (request()->segment(1) == 'kloters') ? 'active' : '' }}">
                <a class="nav-link" href="/kloters">Kloter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'members') ? 'active' : '' }}" href="/members">Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'subjects') ? 'active' : '' }}" href="/subjects">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'tutors') ? 'active' : '' }}" href="/tutors">Tutor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'jams') ? 'active' : '' }}" href="/jams">Jam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'ruangans') ? 'active' : '' }}" href="/ruangans">Ruangan</a>
            </li>
        </ul>


    </div>

    @auth
        <div class="collapse navbar-collapse justify-content-md-center">
            <strong><span class="badge badge-light">Selamat datang {{ auth()->user()->username }}</span></strong>
        </div>
        <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
    @endauth

    <div class="text-end">
        @guest
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
        </div>
    @endguest
</nav>
