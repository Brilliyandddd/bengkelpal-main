@extends('index')
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jml_project }}</h3>

                            <p>Project Active</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-podium"></i>
                        </div>
                        <a href="/projectmenu" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green border border-gray-500">
                        <div class="inner">
                            <h3>{{ $jml_person }}</h3>

                            <p>Person Active</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-person"></i>
                        </div>
                        <a href="/menulanjutan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jml_toolsactive }}</h3>

                            <p>Tools Active</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-hammer"></i>
                        </div>
                        <a href="/tools" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-red">
                        <div class="inner">
                            <h3>{{ $jml_toolsnon }}</h3>

                            <p>Tools NonActive</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-hammer"></i>
                        </div>
                        <a href="/tools" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- LINE CHART -->
            <!-- LINE CHART -->
            <div class="card card-info">
                <div class="card-header bg-blue">
                    <h3 class="card-title">Project Grafik</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header bg-blue">
                    <h3 class="card-title">Aktivitas & Tools Grafik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header bg-blue">
                    <h3 class="card-title">Notifikasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table">
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                @if($d->status === 'Aktif')
                            <tr class="text-green">
                                <td class="text-lg">{{ $d->keterangan }}</td>
                                <td> <i class="fas fa-arrow-up text-green text-lg"></i></td>
                            </tr>
                            @else
                            <tr class="text-red">
                                <td class="text-lg">{{ $d->keterangan }}</td>
                                <td><i class="fas fa-arrow-down text-lg"></i></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
