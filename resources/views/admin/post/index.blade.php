@extends('template-backend.master')
@section('tittle', 'Posts')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <a href="{{ route('post.create') }}" class="btn btn-primary mb-1">Add New Post</a>
    <div class="card p-4">
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Post</th>
                    <th>Category Post</th>
                    <th>Tags</th>
                    <th>Creator</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($post as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->judul }}</td>
                    <td>{{ $value->category->name }}</td>
                    <td>
                        <ul>
                            @foreach ($value->tags as $tag)
                                <h6>
                                    <span class="badge badge-info">
                                        {{ $tag->name }}
                                    </span>
                                </h6>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $value->users->name }}</td>
                    <td><img src="{{ asset($value->gambar) }}" class="img-fluid" width="100px" alt=""></td>
                    <td>
                        <form action="{{ route('post.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('post.edit', $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" align="center">No Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $post->links() }}
    </div>
@endsection