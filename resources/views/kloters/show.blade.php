@extends('master')
@section('title', 'List Kloter - CDIS')

@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kloter</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('kloters.create') }}"> Tambah Kloter</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Nama Kloter</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th>Total Member</th>
                <th>Tutor</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $kloter->id }}</td>
                    <td>{{ $kloter->nama }}</td>
                    <td>
                    {{ $kloter->sesijam->sesi_jam }}
                    </td>
                    <td>{{ $kloter->namaRuangan->nama_ruangan }}</td>
                    <td>@foreach ($ml as $ml)
                        {{ $ml->nama }}
                    @endforeach
                    </td>
                    <td>{{ $kloter->namaTutor->nama_tutor }}</td>
                </tr>
        </tbody>
    </table>
</div>

@endsection