@extends('layouts.masters.main')

@section('title')
    Laporan Keuangan
@endsection

@section('page-content')
  @include('modal.admin.keuangan.tambahKeuangan.tambahKeuangan')
  @include('modal.admin.keuangan.ubahKeuangan.ubahKeuangan')
  @include('modal.admin.keuangan.hapusKeuangan.hapusKeuangan')

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

          <a href="#tambah" data-modal="" id="btnTambahKeuangan" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        </h1>
        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $no = 1; ?>
              @foreach ($keuangan as $value)
                <tr>
                  <td class="text-center">{{ $no }}</td>
                  <td class="text-center">{{ $value->date }}</td>
                  <td>{{ $value->info }}</td>
                  <td class="text-center">Rp{{ number_format($value->total, 2, ",", ".") }}</td>
                  <td class="text-center">
                    <a href="#ubah" id="{{ $value->id }}" class="btn btn-primary" onclick="showEditModal(this)"><i class="fa fa-edit"></i> Ubah</a>
                    &nbsp;
                    <a href="#hapus" id="{{ $value->id }}" class="btn btn-danger" onclick="showDeleteModal(this)"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                <?php $no += 1; ?>
              @endforeach
          </tbody>
        </table>
      </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(function(){
      $.ajaxSetup ({
          cache: false
      });                         
      var loadUrl = "modalTambahKeuangan";
      $("#btnTambahKeuangan").click(function(){
          $("#modal-body-tambahKeuangan").load(loadUrl, function(result){
              $("#modalTambahKeuangan").modal({show:true});
          });
      });
    }); 

    function showEditModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalUbahKeuangan/" + Id;
      $("#modal-body-ubahKeuangan").load(loadUrl, function(result){
          $("#modalUbahKeuangan").modal({show:true});
      });
    }

    function showDeleteModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalHapusKeuangan/" + Id;
      $("#modal-body-hapusKeuangan").load(loadUrl, function(result){
          $("#modalHapusKeuangan").modal({show:true});
      });
    }
  </script>
@endsection