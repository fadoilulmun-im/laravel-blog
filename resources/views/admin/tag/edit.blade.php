@extends('template-backend.master')
@section('tittle', 'Edit Tag')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-3">
        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="tag"><h6>Tag</h6></label>
                <input type="text" class="form-control" id="tag" name="name" value="{{ Request::old('name', $tag->name) }}">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update Tag</button>
            </div>
        </form>
    </div>
@endsection
