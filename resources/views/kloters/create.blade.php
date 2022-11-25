@extends('master')
@section('title', 'Tambah Kloter - CDIS')
@section('menu')
    <li class="nav-item">
        <a class="nav-link active" href="/kloters">Kloter</a>
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


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah Kloter</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('kloters.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('kloters.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Kloter:</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kloter">
                        @error('nama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>List subject:</strong>
                        <select class="js-example-basic-multiple" style="width:100%" multiple="multiple" name="list_subject[]">
                            <option value="0">Pilih Member</option>
                            @foreach ($subject as $s)
                            
                               <option value="{{ $s->id }}">{{ $s->nama_subject }}</option>
                            @endforeach
                         </select>
                        @error('id_jam')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>List Member:</strong>
                        <select class="js-example-basic-multiple" style="width:100%" multiple="multiple" name="list_member[]">
                            <option value="0">Pilih Member</option>
                            @foreach ($member as $m)
                            
                               <option value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endforeach
                         </select>
                        @error('id_jam')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Jam Kloter:</strong>
                        <select class="form-control" name="id_jam">
                            <option value="0">Pilih Jam</option>
                            @foreach ($jam as $c)
                            
                               <option value="{{ $c->id }}">{{ $c->sesi_jam }}</option>
                            @endforeach
                         </select>
                        @error('id_jam')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Ruangan Kloter:</strong>
                        <select class="form-control" name="id_ruangan">
                            <option value="0">Pilih Ruangan</option>
                            @foreach ($ruangan as $r)
                               <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                            @endforeach
                         </select>
                        @error('id_ruangan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Tutor Kloter:</strong>
                        <select class="form-control" name="id_tutor">
                            <option value="0">Pilih Tutor</option>
                            @foreach ($tutor as $t)

                               <option value="{{ $t->id }}">{{ $t->nama_tutor }}</option>
                            @endforeach
                         </select>
                        @error('id_tutor')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            
        });
    </script>
@endsection
