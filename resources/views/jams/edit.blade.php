@extends('master')
@section('title', 'Edit Jam - CDIS')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah Jam</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('jams.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('jams.update', $jam->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sesi Jam:</strong>
                        <input type="text" name="sesi_jam" value="{{ $jam->sesi_jam }}" class="form-control"
                            placeholder="Sesi Jam">
                        @error('sesi_jam')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
