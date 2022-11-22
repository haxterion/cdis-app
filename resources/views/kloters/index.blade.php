@extends('master')
@section('title', 'Kloter - CDIS')

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
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kloter as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->nama }}</td>
                        <td>
                        {{ $j->sesijam->sesi_jam }}
                        </td>
                        <td>{{ $j->namaRuangan->nama_ruangan }}</td>
                        <td> <a class="btn btn-warning" href="{{ route('kloters.show', $j->id) }}">Lihat List Member</a></td>
                        <td>{{ $j->namaTutor->nama_tutor }}</td>
                        <td>
                            <form action="{{ route('kloters.destroy', $j->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('kloters.edit', $j->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $kloter->links() !!}
    </div>

@endsection
