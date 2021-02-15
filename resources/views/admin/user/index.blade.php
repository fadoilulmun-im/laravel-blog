@extends('template-backend.master')
@section('tittle', 'Users')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-1">Add New User</a>
    <div class="card p-4">
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        @if ($value->tipe)
                            <span class="badge badge-info">Admin</span>
                        @else
                            <span class="badge badge-secondary">Author</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('user.edit', $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" align="center">No Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $user->links() }}
    </div>
@endsection