@extends('layouts.masters.main')

@section('title')
    Daftar Anggota
@endsection

@section('page-content')
  @include('modal.admin.anggota.tambahAnggota.tambahAnggota')
  @include('modal.admin.anggota.ubahAnggota.ubahAnggota')
  @include('modal.admin.anggota.hapusAnggota.hapusAnggota')

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

        <a href="{{ url('#') }}" data-modal="" id="btnTambahAnggota" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">No Telp</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>              
            <?php $no = 1; ?>
            @foreach ($user as $value)
              <tr>
                <td class="text-center">{{ $no }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->address }}</td>
                <td class="text-center">{{ $value->no_telp }}</td>
                @if ($value->role == 1)
                  <td class="text-center">Admin</td>
                @else
                  <td class="text-center">User</td>
                @endif
                <td class="text-center">
                  <a href="#ubah" id="{{ $value->id }}" class="btn btn-primary" onclick="showEditModal(this)"><i class="fa fa-edit"></i> Ubah</a>
                  &nbsp;
                  <a href="#hapus" id="{{ $value->id }}" class="btn btn-danger" onclick="showDeleteModal(this)"><i class="fa fa-trash"></i> Hapus</a>
                </td>
                <?php $no += 1;?>
              </tr>
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
    // booth
    $(function(){
      $.ajaxSetup ({
          cache: false
      });                         
      var loadUrl = "modalTambahAnggota";
      $("#btnTambahAnggota").click(function(){
          $("#modal-body-tambahAnggota").load(loadUrl, function(result){
              $("#modalTambahAnggota").modal({show:true});
          });
      });
    }); 

    function showEditModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalUbahAnggota/" + Id;
      $("#modal-body-ubahAnggota").load(loadUrl, function(result){
          $("#modalUbahAnggota").modal({show:true});
      });
    }

    function showDeleteModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalHapusAnggota/" + Id;
      $("#modal-body-hapusAnggota").load(loadUrl, function(result){
          $("#modalHapusAnggota").modal({show:true});
      });
    }
  </script>
@endsection