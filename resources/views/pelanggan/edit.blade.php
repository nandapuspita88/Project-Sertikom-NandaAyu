@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="{{route('pelanggan.update', $pelanggan)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputNama" placeholder="Nama lengkap" name="nama" value="{{$pelanggan->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat</label>
                        <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Masukkan Alamat" name="alamat" value="{{$pelanggan->alamat ?? old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Jenis Kelamin</label>
                        <input type="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleInputJenisKelamin" placeholder="Jenis Kelamin" name="jenis_kelamin" value="{{$pelanggan->jenis_kelamin ?? old('jenis_kelamin')}}" >
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Umur</label>
                        <input type="umur" class="form-control @error('umur') is-invalid @enderror" id="exampleInputUmur" placeholder="Umur" name="umur" value="{{$pelanggan->umur ?? old('umur')}}">
                        @error('umur') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop