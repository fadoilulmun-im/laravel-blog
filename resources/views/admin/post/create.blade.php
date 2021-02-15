@extends('template-backend.master')
@section('tittle', 'Add Post')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-3">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul"><h6>Judul</h6></label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ Request::old('judul','') }}">
                @error('judul')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category"><h6>Category</h6></label>
                <select name="category_id" id="category" class="form-control">
                    <option value="" hidden>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tags"><h6>Tags</h6></label>
                <select class="form-control select2" id="tags" multiple="" name="tags[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content"><h6>Content</h6></label>
                <textarea name="content" id="content" class="form-control" rows="3">{{ Request::old('content','') }}</textarea>
                @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar"><h6>Thumbnail</h6></label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="{{ Request::old('gambar','') }}">
                @error('gambar')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save Post</button>
            </div>
        </form>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> --}}

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
