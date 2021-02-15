@extends('template-backend.master')
@section('tittle', 'Add Tag')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-3">
        <form action="{{ route('tag.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tag"><h6>Tag Name</h6></label>
                <input type="text" class="form-control" id="tag" name="name" value="{{ Request::old('name','') }}">
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save Tag</button>
            </div>
        </form>
    </div>
@endsection
