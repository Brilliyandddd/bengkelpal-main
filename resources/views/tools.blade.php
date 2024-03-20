@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tools </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tools</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--button add-->
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green float-sm-right mr-3" data-toggle="modal" data-target="#modal-add">Tambah Alat</button>
    </div>
    <!--button add-->
    <!--card table-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Alat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Tools</th>
                        <th class="text-center">Nama Tools</th>
                        <th class="text-center">Jumlah Tools</th>
                        <th class="text-center">Status Tools</th>
                        <th class="text-center">Tanggal Kalibrasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_tools }}</td>
                        <td>{{ $item->jumlah_tools }}</td>
                        <td>{{ $item->status_tools }}</td>
                        <td>{{ $item->kalibrasi_date }}</td>
                        <td>
                            <div class="float-lg-right">
                                <form action="/tools/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-delete-tools" class="btn btn-default bg-red sm-right mr-3 mb-3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!--Tombol edit-->
                            <div class="float-lg-right">
                                <button id="btn-edit-tools" type="button" class="btn btn-default bg-blue sm-right mr-3 mb-3" data-toggle="modal" data-target="#modal-edit" data-id="{{ $item->id }}" data-nama_tools="{{ $item->nama_tools }}" data-jumlah_tools="{{ $item->jumlah_tools }}" data-status_tools="{{ $item->status_tools }}" data-kalibrasi_date="{{ $item->kalibrasi_date }} ">
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
                        <th class="text-center">Nama Tools</th>
                        <th class="text-center">Jumlah Tools</th>
                        <th class="text-center">Status Tools</th>
                        <th class="text-center">Tanggal Kalibrasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot> -->
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
                    <h4 class="modal-title">Tambah Tools</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/tools">
                        @csrf
                        <div class="form-group">
                            <label for="inputnamaalat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_tools" placeholder="Nama Alat" name="nama_tools">
                        </div>
                        <div class="form-group">
                            <label for="inputjumalahalt">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_tools" placeholder="Jumlah" name="jumlah_tools">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2bs4" style="width: 100%;" id="status_tools" name="status_tools">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                        <!--/Date-->
                        <div class="form-group">
                            <label>Tanggal Kalibrasi</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input id="kalibrasi_date" type="date" class="form-control " name="kalibrasi_date" />
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
    <!--end modal add-->

    <!-- /.modal Add Data-->
    <div class="modal fade" id="modal-edit-tools">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Tools</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" id="formEdit">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="inputnamaalat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_tools-edit" placeholder="Nama Alat" name="nama_tools">
                        </div>
                        <div class="form-group">
                            <label for="inputjumalahalt">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_tools-edit" placeholder="Jumlah" name="jumlah_tools">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2bs4" style="width: 100%;" id="status_tools-edit" name="status_tools">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                        <!--/Date-->
                        <div class="form-group">
                            <label>Tanggal Kalibrasi</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input id="kalibrasi_date-edit" type="date" class="form-control" name="kalibrasi_date" />
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
    <!--end modal add-->

</div>

@endsection
