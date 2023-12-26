@extends('layouts.app')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form class="form row" method="POST" action="{{route('user.update', [$user->id])}}">
                            @csrf
                            <div class="form-group col-lg-6 mb-2">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger ml-2">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mb-2">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger ml-2">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mb-2">
                                <label for="">Password <small class="text-danger">* Isi apabila ingin mengubah password</small></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="text-danger ml-2">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mb-2">
                                <label for="">Password Konfirmasi</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="text-danger ml-2">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mb-2">
                                <label for="">Role</label>
                                <input type="hidden" name="role" value="{{$user->role}}">
                                <select class="form-control @error('password') is-invalid @enderror" disabled>
                                    <option value="1" @if($user->role == 1) selected @endif>Administrator</option>
                                    <option value="2" @if($user->role == 2) selected @endif>Dosen</option>
                                    <option value="3" @if($user->role == 3) selected @endif>Mahasiswa</option>
                                </select>
                                @error('role')
                                    <span class="text-danger ml-2">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection