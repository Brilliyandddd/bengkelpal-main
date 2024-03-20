@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Divisi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/tools">Home</a></li>
                        <li class="breadcrumb-item active">divisi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-add-divisi">Tambah divisi</button>
    </div>
    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data divisi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID divisi</th>
                        <th class="text-center">Nama Divisi</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>

                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_divisi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/divisi/{{ $item->id }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" id="btn-delete-divisi" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                                <button id="btn-edit-divisi" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit-divisi" data-id="{{ $item->id }}" data-nama_divisi="{{ $item->nama_divisi }}" data-keterangan="{{ $item->keterangan }}">
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
    <div class="modal fade" id="modal-add-divisi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah divisi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/divisi">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Divisi</label>
                                <input type="text" class="form-control" id="nama_divisi_divisi-edit" name="nama_divisi">
                            </div>
                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="Keterangan" name="keterangan">
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
    <div class="modal fade" id="modal-edit-divisi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data divisi</h4>
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
                                <label>Nama Divisi</label>
                                <input type="text" class="form-control" id="nama_divisi_divisi-edit" name="nama_divisi">
                            </div>
                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan_divisi-edit" name="keterangan">
                            </div>
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
