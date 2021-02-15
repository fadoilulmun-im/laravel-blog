@extends('template-backend.master')
@section('tittle', 'Edit Category')
@section('content')
    <div class="card p-3">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="category"><h6>Category</h6></label>
                <input type="text" class="form-control" id="category" name="name" value="{{ Request::old('name', $category->name) }}">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save Category</button>
            </div>
        </form>
    </div>
@endsection