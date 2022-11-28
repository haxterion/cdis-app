@extends('master')
@section('title', 'CDIS')
@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/kloters">Kloter</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/members">Members</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/subjects">Subject</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/tutors">Tutor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/jams">Jam</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ruangans">Ruangan</a>
    </li>
@endsection
@section('content')



        <section class="py-5 text-center container">
            <div class="row ">
                <div class="col-lg-6 col-md-8 mx-auto ">
                    <h1 class="animate__animated animate__bounce animate__delay-1s animate__repeat-2 animate__slower-3s"
                        class="fw-light fw-bold ">Class Distribution Information System</h1>
                    <h1 class=" lead text-muted">Selamat Datang Di Apikasi Pendistribusian Kelas,Semoga Dapat
                        Mempercepat Pekerjaan Anda.Terima Kasih</h1>

                </div>
            </div>
        </section>

        <div class="album  bg-light ">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm ">
                            <div class="card card bg-primary card-border-danger">
                                <h4 class="card-header fw-bold text-light">Member</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Member</h5>
                                    <p class="card-text text-light">{{$member}}</p>
                                    <a href="/members" class="btn btn-primary bg-warning">Go To Member</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm ">
                            <div class="card bg-primary card-border-danger">
                                <h4 class="card-header  fw-bold text-light">Kloter</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Kloter</h5>
                                    <p class="card-text text-light">{{$kloter}}</p>
                                    <a href="/kloters" class="btn btn-primary  bg-warning">Go To Kloter</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card bg-primary card-border-danger">
                                <h4 class="card-header fw-bold text-light">Tutor</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Tutor</h5>
                                    <p class="card-text text-light">{{$tutor}}</p>
                                    <a href="/tutors" class="btn btn-primary bg-warning">Go To Tutor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card bg-primary card-border-danger">
                                <h4 class="card-header fw-bold text-light">Ruangan</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Ruangan</h5>
                                    <p class="card-text text-light">{{$ruangan}}</p>
                                    <a href="/ruangans" class="btn btn-primary bg-warning">Go To Ruangan</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card bg-primary">
                                <h4 class="card-header fw-bold text-light">Subject</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Subject</h5>
                                    <p class="card-text text-light">{{$subject}}</p>
                                    <a href="/subjects" class="btn btn-primary bg-warning">Go To Subject</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card bg-primary">
                                <h4 class="card-header fw-bold text-light">Sesi Jam</h4>
                                <div class="card-body">
                                    <h5 class="card-title text-light">Total Sesi Jam</h5>
                                    <p class="card-text text-light">{{$jam}}</p>
                                    <a href="/jams" class="btn btn-primary bg-warning">Go To Sesi Jam</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    

    <footer class="text-muted py-5">
        <div class="container">

            <p class="mb-1 fw-bold"> &copy; GE | Global English Pare 2022</p>
            <p class="mb-0 fw-bold">Aplikasi Ini di Buat Oleh Mr.Rizal Dan Amik Taruna Team </p>
            <p><a href="https://globalenglish.co.id/">Go To Website</a> </p>
        </div>
    </footer>


@endsection
