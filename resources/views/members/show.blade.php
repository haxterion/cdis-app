@extends('master')
@section('title')
    Kloter - {{ $member->nama }}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    {{-- <h2>{{ $member->nama }}</h2> --}}
                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                List Kloter : <span class="badge badge-primary">
                    <h6><strong>{{ $member->nama }}</strong></h6>
                </span>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kloter as $j)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $j->nama }}</td>

                                <td>
                                    {{ $j->sesijam->sesi_jam }}
                                </td>
                                <td>{{ $j->namaRuangan->nama_ruangan }}</td>


                                <td>{{ $j->namaTutor->nama_tutor }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- {!! $kloter->links() !!} --}}
    </div>
@endsection
