@extends('template-backend.master')
@section('tittle', 'Tambah User')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session('success') }}</div>
    @endif
    <div class="card p-3">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name"><h6>Nama User</h6></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Request::old('name', $user->name) }}">
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email"><h6>Email</h6></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Request::old('name', $user->email) }}" readonly>
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tipe"><h6>Tipe user</h6> </label>
                <select name="tipe" id="tipe" class="form-control">
                    <option value="" hidden>Pilih Tipe User</option>
                    <option value="1"
                        @if ($user->tipe == 1)
                            selected
                        @endif
                        >
                        Administrator
                    </option>
                    <option value="0"
                        @if ($user->tipe == 0)
                            selected
                        @endif
                        >
                        Penulis
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="password"><h6>Password</h6></label>
                <input type="text" class="form-control" id="password" name="password" value="{{ Request::old('name','') }}">
                
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Simpan User</button>
            </div>
        </form>
    </div>
@endsection
