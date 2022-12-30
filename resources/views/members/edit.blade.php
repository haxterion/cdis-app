@extends('master')
@section('title', 'Tambah Member - CDIS')

@section('content')


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Member</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nama Member:</strong>
                        <input type="text" name="nama" value="{{ $member->nama }}" class="form-control" placeholder="Nama Member">
                        @error('nama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No Telp:</strong>
                        <input type="number" name="notelp" value="{{ $member->notelp }}" class="form-control" placeholder="No Telp">
                        @error('notelp')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Kloter:</strong>
                        <input type="text" name="id_kloter" value="{{ $member->id_kloter }}" class="form-control" placeholder="Pilih Kloter">
                        @error('id_kloter')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat Member:</strong>
                        <textarea class="form-control" name="alamat"> {{ $member->alamat }}" </textarea>
                        @error('alamat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
