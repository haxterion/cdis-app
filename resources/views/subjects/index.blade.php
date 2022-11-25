@extends('master')
@section('title', 'Subject - CDIS')
@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/kloters">Kloter</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/members">Members</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/subjects">Subject</a>
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
                    <h2>Subject</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('subjects.create') }}"> Tambah Subject</a>
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
                    <th>Nama Subject</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->nama_subject }}</td>
                        <td>
                            <form action="{{ route('subjects.destroy', $j->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('subjects.edit', $j->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $subject->links() !!}
    </div>

@endsection
