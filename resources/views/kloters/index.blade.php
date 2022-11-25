@extends('master')
@section('title', 'Kloter - CDIS')
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
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama Kloter</th>
                    <th>List Subject</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Kapasitas Member</th>
                    <th>Lihat Member</th>
                    <th>Tutor</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($kloter as $j)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $j->nama }}</td>
                        <td><a class="btn btn-warning" href="{{ route('kloters.show', $j->id) }}">Lihat List</a></td>
                        <td>
                            {{ $j->sesijam->sesi_jam }}
                        </td>
                        <td>{{ $j->namaRuangan->nama_ruangan }}</td>
                        <td>
                            @php
                                $s = str_replace(['[', ']'], '', $j->list_member);
                                $mm = explode(',', $s);
                                
                                // print_r($mm);
                                
                                $lm = sizeof($mm);
                                
                                // $ml = count($mm);
                                if ($lm < 20) {
                                    $ll = 'masih ada slot';
                                } else {
                                    $ll = 'tidak ada slot';
                                }
                                $lp = 20;
                            @endphp

                            {{ $lm }}/20 Member
                        </td>
                        <td><a class="btn btn-warning" href="{{ route('kloters.show', $j->id) }}">Lihat List</a>
                        <td>{{ $j->namaTutor->nama_tutor }}</td>
                        <td>
                            <form action="{{ route('kloters.destroy', $j->id) }}" method="Post">
                                @if ($lm < 20)
                                    <a class="btn btn-primary" href="{{ route('kloters.edit', $j->id) }}">Tambah Member</a>
                                @else
                                    <button type="button" class="btn btn-basic" disabled>Kuota Terpenuhi</button>
                                @endif
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {!! $kloter->links() !!} --}}
    </div>
    
@endsection
