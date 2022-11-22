@extends('master')
@section('title', 'Tutor - CDIS')

@section('content')


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Tutor</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('tutors.create') }}"> Tambah Tutor</a>
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
                    <th>Nama Tutor</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutor as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->nama_tutor }}</td>
                        <td>
                            <form action="{{ route('tutors.destroy', $j->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('tutors.edit', $j->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $tutor->links() !!}
    </div>

@endsection
