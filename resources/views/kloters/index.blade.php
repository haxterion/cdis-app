@extends('master')
@section('title', 'Kloter - CDIS')

@section('content')


    <div class="container mt-2">

        
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <h3> Kloter </h3>
        <hr/>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ route('kloters.create') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
                    </svg> Tambah Kloter</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg>
                    Hapus semua data
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin untuk menghapus semua data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('kloters-delete-all-data') }}" method="Post">
                                @csrf
                                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg> Delete all data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Nama Kloter</th>
                            <th>Periode</th>
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
                                <td>{{ $j->periode }}
                                </td>
                                <td>
                                    {{ $j->sesijam->sesi_jam }}
                                </td>
                                <td>{{ $j->namaRuangan->nama_ruangan ?? 'Ruangan tidak ditemukan' }}</td>
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
                                <td>{{ $j->namaTutor->nama_tutor ?? 'Tutor tidak ditemukan' }}</td>
                                <td>
                                    <form action="{{ route('kloters.destroy', $j->id) }}" method="Post">
                                        @if ($lm < 20)
                                            <a class="btn btn-primary" href="{{ route('kloters.edit', $j->id) }}">Tambah
                                                Member</a>
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
        </div>
    </div>

@endsection
