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
                    <a class="btn btn-success" href="{{ route('members.create') }}"> Tambah Member</a>
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
                    <th>Nama Member</th>
                    <th>No Telephone</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->nama }}</td>
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
        {!! $member->links() !!}
    </div>

@endsection
