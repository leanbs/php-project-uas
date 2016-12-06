@extends('layouts.masters.main')

@section('title')
    Daftar Anggota
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
          <i class="fa fa-child"></i>
          Daftar Anggota
        </h1>

        <a href="{{ url('#') }}" data-modal="" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
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