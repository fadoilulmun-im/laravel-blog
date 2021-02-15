@extends('template-backend.master')
@section('tittle', 'Post Yang Sudah Dihapus')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-4">
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Post</th>
                    <th>Category Post</th>
                    <th>Tags</th>
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
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td><img src="{{ asset($value->gambar) }}" class="img-fluid" width="100px" alt=""></td>
                    <td>
                        <form action="{{ route('post.kill', $value->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('post.restore', $value->id) }}" class="btn btn-info btn-sm">Restore</a>
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