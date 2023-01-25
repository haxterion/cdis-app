@extends('master')
@section('title', 'Member - CDIS')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Member</h2>
                </div>
                <div class="pull-right mb-2">


                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Import data
                    </div>
                    <div class="card-body">

                        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="file" name="file" class="form-control-file id="exampleFormControlFile1">
                                {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}

                            </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Import data</button>

                        <a class="btn btn-success" href="/members/file-export">Export data</a>
                        </form>

                    </div>
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
                    <a class="btn btn-success" href="{{ route('members.create') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
                        </svg> Tambah Member</a>
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
                            <form action="{{ route('delete-all-data') }}" method="Post">
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
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>List Kloter</th>
                            <th>No Telephone</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            
                        @endphp
                        @foreach ($member as $j)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $j->nama }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('members.show', $j->id) }}">Lihat List</a>
                                </td>
                                <td>{{ $j->notelp }}</td>

                                <td>
                                    <form action="{{ route('members.destroy', $j->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('members.edit', $j->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- {!! $member->links() !!} --}}
    </div>

@endsection
