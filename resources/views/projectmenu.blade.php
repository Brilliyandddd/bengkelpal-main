@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Project Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Project Menu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--Button add data-->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-add">Tambah Project</button>
    </div>
    <!--/ End Button add data-->
    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Project</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Project</th>
                        <th class="text-center">Nama Project</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Tanggal Selesai</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_project }}</td>
                        <td>{{ $item->start_project }}</td>
                        <td>{{ $item->finish_project }}</td>
                        <td>{{ $item->keterangan_project }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/projectmenu/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-delete-project" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                                <button id="btn-edit-project" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit" data-id="{{ $item->id }}" data-nama_project="{{ $item->nama_project }}" data-start_project="{{ $item->start_project }}" data-finish_project="{{ $item->finish_project }}" data-keterangan_project="{{ $item->keterangan_project }}">
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
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/projectmenu">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputNama">Nama Project</label>
                                <input type="text" class="form-control" id="InputNama" placeholder="Nama project" name="nama_project">
                            </div>
                            <!--/Date-->
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest"name="start_project">
                                    <input id="start_project" type="date" class="form-control " name="start_project" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="finish_project" type="date" class="form-control " name="finish_project" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="InputKeterangan" placeholder="Keterangan" name="keterangan_project">
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
    <!-- /.modal Add Data-->

    <!-- /.modal Edit Data-->
    <div class="modal fade" id="modal-edit-projectmenu">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Project</h4>
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
                                <label for="InputNama">Nama Project</label>
                                <input type="text" class="form-control" id="nama_project-edit" name="nama_project">
                            </div>
                            <!--/Date-->
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="start_project-edit" type="date" class="form-control " name="start_project" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="finish_project-edit" type="date" class="form-control " name="finish_project" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan_project-edit" placeholder="Keterangan" name="keterangan_project">
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
