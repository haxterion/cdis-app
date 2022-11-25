@extends('master')
@section('title', 'Edit Ruangan - CDIS')
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
        <a class="nav-link active" href="/ruangans">Ruangan</a>
    </li>
@endsection
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah Ruangan</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('ruangans.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('ruangans.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sesi Ruangan:</strong>
                        <input type="text" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" class="form-control"
                            placeholder="Nama Ruangan">
                        @error('nama_ruangan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
