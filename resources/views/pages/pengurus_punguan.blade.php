@extends('layouts.masters.main')

@section('title')
    Pengurus Punguan
@endsection

@section('page-content')

<div class="container">

    @include ('layouts.masters.nav')

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="box">
              <div class="box-header">
              </div>
                <!-- /.box-header -->
              <div class="box-body">
                <h1>
                    <i class="fa fa-user"></i>
                    Pengurus se-Jabodetabek
                    <a id="add-tipe" href="{{ url('#') }}" data-modal="" class="btn btn-success btn-compact pull-right">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </a>
                </h1>
                <hr>

                <table id="table-tipe" class="table table-bordered table-hover table-striped">
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
               </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-xs-12 col-md-6">
            <div class="box">
              <div class="box-header">
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                        <h1>
                            <i class="fa fa-users"></i>
                            Pengurus Wilayah
                            <a id="add-project" href="{{ url('#') }}" data-modal="" class="btn btn-success btn-compact pull-right">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </h1>
                        <hr>

                        <table id="table-merk" class="table table-bordered table-hover table-striped">
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
               </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container -->
@endsection