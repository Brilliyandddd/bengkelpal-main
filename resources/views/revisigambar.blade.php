@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Revisi Gambar </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Revisi Gambar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-add-revisi">Tambah Revisi</button>
    </div>

    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Revisi Gambar</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Revisi</th>
                        <th class="text-center">Project</th>
                        <th class="text-center">Judul Revisi</th>
                        <th class="text-center">Status Revisi</th>
                        <th class="text-center">Keterangan Revisi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->project->nama_project }}</td>
                        <td>{{ $item->judul_revisi }}</td>
                        <td>{{ $item->status_revisi }}</td>
                        <td>{{ $item->keterangan_revisi }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/revisigambar/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-delete-revisigambar" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                                <button id="btn-edit-revisigambar" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit-revisi" data-id="{{ $item->id }}" data-nama_project="{{ $item->nama_project }}" data-judul_revisi="{{ $item->judul_revisi }}" data-status_revisi="{{ $item->status_revisi }}" data-keterangan_revisi="{{ $item->keterangan_revisi }}" data-id_project="{{ $item->id_project }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <!--Tombol edit-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <!-- <tr>
                        <th class="text-center">ID Project</th>
                        <th class="text-center">Nama Project</th>
                        <th class="text-center">Tanggal Mulai - Selesai</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr> -->
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.modal Add Data-->
    <div class="modal fade" id="modal-add-revisi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Revisi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/revisigambar">
                        @csrf

                        <!--/select Project-->
                        <!--select Project-->
                        <div class="form-group">
                            <label>Project</label>
                            <select class="form-control select2bs4" style="width: 100%" name="id_project">
                                @foreach($isicombo as $a)
                                <option value="{{ $a->id }}"> {{ $a->nama_project }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--/select Project-->
                        <div class="form-group">
                            <label for="InputNama">Judul Revisi</label>
                            <input type="text" class="form-control" id="judul_revisi" placeholder="Judul Revisi" name="judul_revisi">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2bs4" style="width: 100%;" id="status_revisi" name="status_revisi">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="InputKeterangan">Keterangan</label>
                            <input type="text" class="form-control" id="InputKeterangan" placeholder="Keterangan Revisi" name="keterangan_revisi">
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
    <!-- /.modal Add Data-->
    <!-- /.modal Edit Data-->
    <div class="modal fade" id="modal-edit-revisi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Aktivitas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" id="formEdit">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <!--select Project-->
                            <div class="form-group">
                                <label>Project</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_project-edit" name="id_project">
                                    @foreach($isicombo as $a)
                                    <option value="{{ $a->id }}"> {{ $a->nama_project }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--/select Project-->
                            <div class="form-group">
                                <label for="InputNama">Judul Revisi</label>
                                <input type="text" class="form-control" id="judul_revisi-edit" name="judul_revisi">
                            </div>
                            <!--/Date-->
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="status_revisi-edit" name="status_revisi">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan_revisi-edit" name="keterangan_revisi">
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
