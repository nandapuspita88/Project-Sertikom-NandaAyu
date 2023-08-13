@extends('adminlte::page')

@section('title', 'List Obat')

@section('content_header')
    <h1 class="m-0 text-dark">List Obat</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('obat.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Nama Pelanggan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obat as $key => $obats)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$obats->nama}}</td>
                                <td>{{$obats->jenis}}</td>
                                <td>{{$obats->harga}}</td>
                                <td>{{$obats->pelanggan->nama}}</td>
                                <td>
                                    <a href="{{route('obat.edit', $obats)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('obat.destroy', $obats)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush