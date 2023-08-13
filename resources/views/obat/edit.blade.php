@extends('adminlte::page')
@section('title', 'Edit Obat')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Obat</h1>
@stop
@section('content')
    <form action="{{route('obat.update', $obat)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputNama" placeholder="Nama" name="nama" value="{{$obat->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jenis Obat</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="exampleInputJenis" placeholder="Masukkan Jenis" name="jenis" value="{{$obat->jenis ?? old('jenis')}}">
                        @error('jenis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga" name="harga" value="{{$obat->harga ?? old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                            <label for="position-option">Nama Pelanggan</label>
                            <select class="form-control" id="position-option" name="pelanggan_id">
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                @endforeach
                            </select>
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