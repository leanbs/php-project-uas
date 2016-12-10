@extends('layouts.masters.main')

@section('title')
    Daftar Category
@endsection

@section('page-content')
  @include('modal.admin.category.tambahCategory.tambahCategory')
  @include('modal.admin.category.ubahCategory.ubahCategory')
  @include('modal.admin.category.hapusCategory.hapusCategory')

  <div class="container">

    @include ('layouts.masters.nav')

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <h1>
          <i class="fa fa-book"></i>
          Daftar Category
        </h1>

        <a href="{{ url('#') }}" data-modal="" id="btnTambahCategory" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>              
            <?php $no = 1; ?>
            @foreach ($Category as $value)
              <tr>
                <td class="text-center">{{ $no }}</td>
                <td>{{ $value->name }}</td>
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
    $(function(){
      $.ajaxSetup ({
          cache: false
      });                         
      var loadUrl = "modalTambahCategory";
      $("#btnTambahCategory").click(function(){
          $("#modal-body-tambahCategory").load(loadUrl, function(result){
              $("#modalTambahCategory").modal({show:true});
          });
      });
    }); 

    function showEditModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalUbahCategory/" + Id;
      $("#modal-body-ubahCategory").load(loadUrl, function(result){
          $("#modalUbahCategory").modal({show:true});
      });
    }

    function showDeleteModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalHapusCategory/" + Id;
      $("#modal-body-hapusCategory").load(loadUrl, function(result){
          $("#modalHapusCategory").modal({show:true});
      });
    }
  </script>
@endsection