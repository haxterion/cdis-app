@extends('master')
@section('title', 'Edit Kloter - CDIS')
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
        <form action="{{ route('kloters.update', $kloter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sesi Kloter:</strong>
                        <input type="text" name="nama" value="{{ $kloter->nama }}" class="form-control"
                            placeholder="Nama Kloter">
                        @error('nama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>List Subject:</strong>
                        <select class="js-example-basic-multiple" style="width:100%" multiple="multiple" name="list_subject[]">
                            <option value="0" disabled>Pilih Member</option>
                            @foreach ($subject as $s)
                            @if(in_array($s->id, $ls))
                            <option value="{{ $s->id }}" selected>{{ $s->nama_subject }}</option>
                                
                            @else
                            <option value="{{ $s->id }}" >{{ $s->nama_subject }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('list_subject')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>List Member:</strong>
                        <select class="js-example-basic-multiple" id="mySelect2" style="width:100%" multiple="multiple" name="list_member[]">
                            <option value="0" disabled>Pilih Member</option>
                            @foreach ($member as $m)
                            @if(in_array($m->id, $lm))
                            <option value="{{ $m->id }}" selected>{{ $m->nama }}</option>
                                
                            @else
                            <option value="{{ $m->id }}" >{{ $m->nama }}</option>
                            @endif
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
                                <option value="{{ $c->id }}" {{ $c->id == $kloter->id_jam ? 'selected' : '' }}>
                                    {{ $c->sesi_jam }}</option>
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
                                <option value="{{ $r->id }}" {{ $r->id == $kloter->id_ruangan ? 'selected' : '' }}>
                                    {{ $r->nama_ruangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Tutor Kloter:</strong>
                        <select class="form-control" name="id_tutor">
                            <option value="0">Pilih Tutor</option>
                            @foreach ($tutor as $t)
                                <option value="{{ $t->id }}" {{ $t->id == $kloter->id_tutor ? 'selected' : '' }}>
                                    {{ $t->nama_tutor }}</option>
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
        <div class="pull-left">
            <h2>List Member</h2>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama Member</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mem as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>
                            {{ $m->notelp }}
                        </td>
                        <td>{{ $m->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            
        });
    </script>
@endsection
