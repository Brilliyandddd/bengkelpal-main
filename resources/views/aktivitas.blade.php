@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Aktivitas </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Aktivitas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--Button add data-->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-add-aktivitas">Tambah Aktivitas</button>
    </div>
    <!--/ End Button add data-->
    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Aktivitas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Aktivitas</th>
                        <th class="text-center">Project</th>
                        <th class="text-center">Nama Aktivitas</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Tanggal Selesai</th>
                        <th class="text-center">Status</th>
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
                        <td>{{ $item->project->nama_project }}</td>
                        <td>{{ $item->nama_aktivitas }}</td>
                        <td>{{ $item->start_aktivitas }}</td>
                        <td>{{ $item->finish_aktivitas }}</td>
                        <td>{{ $item->status_aktivitas }}</td>
                        <td>{{ $item->keterangan_aktivitas }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/aktivitas/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-delete-aktivitas" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                            <button id="btn-edit-aktivitas" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit-aktivitas" data-id="{{ $item->id }}" data-nama_project="{{ $item->nama_project }}" data-nama_aktivitas="{{ $item->nama_aktivitas }}" data-status_aktivitas="{{ $item->status_aktivitas }}" data-start_aktivitas="{{ $item->start_aktivitas }}"   data-finish_aktivitas="{{ $item->finish_aktivitas }}"   data-keterangan_aktivitas="{{ $item->keterangan_aktivitas }}" data-id_project="{{ $item->id_project }}">
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
    <div class="modal fade" id="modal-add-aktivitas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Aktivitas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/aktivitas">
                        @csrf
                        <div class="card-body">
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
                                <label for="InputNama">Nama Aktivitas</label>
                                <input type="text" class="form-control" id="nama_aktivitas" placeholder="Nama Aktivitas" name="nama_aktivitas">
                            </div>
                            <!--/Date-->
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="start_aktivitas" type="date" class="form-control " name="start_aktivitas" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="finish_aktivitas" data-target-input="nearest">
                                    <input id="add-start-aktivitas" type="date" class="form-control " name="finish_aktivitas" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="status_aktivitas" name="status_aktivitas">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="InputKeterangan" placeholder="Keterangan" name="keterangan_aktivitas">
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
    <div class="modal fade" id="modal-edit-aktivitas">
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
                                <label for="InputNama">Nama Aktivitas</label>
                                <input type="text" class="form-control" id="nama_aktivitas-edit"  name="nama_aktivitas">
                            </div>
                            <!--/Date-->
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="start_aktivitas-edit" type="date" class="form-control " name="start_aktivitas" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="finish_aktivitas" data-target-input="nearest">
                                    <input id="finish_aktivitas-edit" type="date" class="form-control " name="finish_aktivitas" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="status_aktivitas-edit" name="status_aktivitas">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="InputKeterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan_aktivitas-edit" name="keterangan_aktivitas">
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
