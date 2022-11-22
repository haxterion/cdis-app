@extends('master')
@section('title', 'Edit Kloter - CDIS')

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
                        <input type="text" name="nama" value="{{ $kloter->nama }}" class="form-control" placeholder="Nama Kloter">
                        @error('nama')
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
                            
                               <option value="{{ $c->id }}" {{ ( $c->id == $kloter->id_jam) ? 'selected' : '' }}>{{ $c->sesi_jam }}</option>
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
                            
                               <option value="{{ $r->id }}" {{ ( $r->id == $kloter->id_ruangan) ? 'selected' : '' }}>{{ $r->nama_ruangan }}</option>
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
                            
                               <option value="{{ $t->id }}" {{ ( $t->id == $kloter->id_tutor) ? 'selected' : '' }}>{{ $t->nama_tutor }}</option>
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
@endsection
