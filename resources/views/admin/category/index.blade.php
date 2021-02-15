@extends('template-backend.master')
@section('tittle', 'Categories')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-1">Add New Category</a>
    <div class="card p-4">
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($category as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <form action="{{ route('category.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('category.edit', $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
        {{ $category->links() }}
    </div>
@endsection