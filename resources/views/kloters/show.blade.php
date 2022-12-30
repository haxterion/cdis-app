@extends('master')
@section('title', 'List Kloter - CDIS')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Kloter</h2>
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
                    <td>{{ $kloter->namaTutor->nama_tutor }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama Subject</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sl as $s)
                    <tr>

                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nama_subject }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-left">
            <h2>List Member</h2>
            @php
                $s = str_replace(['[', ']'], '', $kloter->list_member);
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
            @if ($lm < 20)
                <a class="btn btn-primary" href="{{ route('kloters.edit', $kloter->id) }}">Tambah Member</a>
            @else
                <button type="button" class="btn btn-basic" disabled>Kuota Terpenuhi</button>
            @endif
        </div>
        <div class="pull-right mb-2">
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
                @foreach ($ml as $m)
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

@endsection
