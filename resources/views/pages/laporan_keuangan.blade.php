@extends('layouts.masters.main')

@section('title')
    Laporan Keuangan
@endsection

@section('page-content')

  <div class="container">

    @include ('layouts.masters.nav')

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <h1>
          <i class="fa fa-money"></i>
          Laporan Keuangan

          <a href="{{ url('/gaji/create') }}" data-modal="" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        </h1>
        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Action</th>
              </tr>
          </thead>
        </table>
      </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection