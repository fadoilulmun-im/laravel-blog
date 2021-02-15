@extends('template-backend.master')
@section('tittle', 'Add Category')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-3">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category"><h6>Category Name</h6></label>
                <input type="text" class="form-control" id="category" name="name" value="{{ Request::old('name','') }}">
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save Category</button>
            </div>
        </form>
    </div>
@endsection
