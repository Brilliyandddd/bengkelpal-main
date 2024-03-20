@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu Lanjutan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Menu Lanjutan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-add">Tambah Pegawai</button>
    </div>
    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID pegawai</th>
                        <th class="text-center">Nip pegawai</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/menulanjutan/{{ $item->id }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" id="btn-delete-pegawai" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                                <button id="btn-edit-menulanjutan" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit" data-id="{{ $item->id }}" data-nip="{{ $item->nip }}" data-nama="{{ $item->nama }}" data-jabatan="{{ $item->jabatan }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <!--Tombol edit-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th class="text-center">ID Pegawai</th>
                        <th class="text-center">Nip Pegawai</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot> -->
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.modal Add data-->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/menulanjutan">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputNip">NIP</label>
                                <input type="number" class="form-control" id="InputNip" placeholder="Nama project" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="InputNama">Nama</label>
                                <input type="text" class="form-control" id="InputNama" placeholder="Keterangan" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="InputJabatan">Jabatan</label>
                                <input type="text" class="form-control" id="InputJabatan" placeholder="Keterangan" name="jabatan">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Add data-->
    <!-- /.modal Edit Data-->
    <div class="modal fade" id="modal-edit-menulanjutan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdit">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputNip">Nip</label>
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="InputNama">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="InputJabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.modal-content -->
        </div>

        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Edit Data-->



</div>

@endsection
