@extends('layouts.masters.main')

@section('title')
    Informasi Kegiatan
@endsection

@section('page-content')
  @include('modal.admin.kegiatan.tambahKegiatan.tambahKegiatan')
  @include('modal.admin.kegiatan.ubahKegiatan.ubahKegiatan')
  @include('modal.admin.kegiatan.hapusKegiatan.hapusKegiatan')

  <div class="container">

    @include ('layouts.masters.nav')

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <h1>
          <i class="fa fa-calendar"></i>
          Informasi Kegiatan

          <a href="#" data-modal="" id="btnTambahKegiatan" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        </h1>
        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Kegiatan</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $no = 1; ?>
              @foreach ($kegiatan as $value)
                <tr>
                  <td class="text-center">{{ $no }}</td>
                  <td>{{ $value->name }}</td>
                  <td class="text-center">{{ $value->date }}</td>
                  <td>{{ $value->info }}</td>
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
      var loadUrl = "modalTambahKegiatan";
      $("#btnTambahKegiatan").click(function(){
          $("#modal-body-tambahKegiatan").load(loadUrl, function(result){
              $("#modalTambahKegiatan").modal({show:true});
          });
      });
    }); 

    function showEditModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalUbahKegiatan/" + Id;
      $("#modal-body-ubahKegiatan").load(loadUrl, function(result){
          $("#modalUbahKegiatan").modal({show:true});
      });
    }

    function showDeleteModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalHapusKegiatan/" + Id;
      $("#modal-body-hapusKegiatan").load(loadUrl, function(result){
          $("#modalHapusKegiatan").modal({show:true});
      });
    }
  </script>
@endsection