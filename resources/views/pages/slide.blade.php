@extends('layouts.masters.main')

@section('title')
    Daftar Slide
@endsection

@section('page-content')
  @include('modal.admin.slide.tambahSlide.tambahSlide')
  @include('modal.admin.slide.ubahSlide.ubahSlide')
  @include('modal.admin.Slide.hapusSlide.hapusSlide')

  <div class="container">

    @include ('layouts.masters.nav')

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <h1>
          <i class="fa fa-book"></i>
          Daftar Slide
        </h1>

        <a href="{{ url('#') }}" data-modal="" id="btnTambahSlide" class="btn btn-success btn-compact pull-right">
              <i class="fa fa-plus"></i>
              Tambah
          </a>

        <table id="table-transaksi" class="table-transaksi table table-bordered table-hover table-striped">
          <thead>
              <tr>
                <th class="text-center col-md-1">No</th>
                <th class="text-center col-md-2">Gambar</th>
                <th class="text-center col-md-3">Judul</th>
                <th class="text-center col-md-4">Keterangan</th>
                <th class="text-center col-md-1">Status</th>
                <th class="text-center col-md-1">Action</th>
              </tr>
          </thead>
          <tbody>              
            <?php $no = 1; ?>
            @foreach ($Slide as $value)
              <tr>
                <td class="text-center">{{ $no }}</td>
                <td><img src="{{ $value->image_path }}/{{ $value->image_name }}" alt="image" width="200px"></td>
                <td>{{ $value->title }}</td>
                <td><?php echo $value->info; ?></td>
                @if ($value->status == 1)
                  <td class="text-center">Aktif</td>
                @else
                  <td class="text-center">Tidak Aktif</td>
                @endif                
                <td class="text-center">
                  @if ($value->status == 1)
                    <a href="#matikan" id="{{ $value->id }}" class="btn btn-danger btn-block" onclick="turnOff(this)"><i class="fa fa-toggle-on"></i> Matikan</a>
                  @else
                    <a href="#aktifkan" id="{{ $value->id }}" class="btn btn-success btn-block" onclick="turnOn(this)"><i class="fa fa-toggle-off"></i> Aktifkan</a>
                  @endif                  
                  <a href="#ubah" id="{{ $value->id }}" class="btn btn-primary btn-block" onclick="showEditModal(this)"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="#hapus" id="{{ $value->id }}" class="btn btn-danger btn-block" onclick="showDeleteModal(this)"><i class="fa fa-trash"></i> Hapus</a>
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
      var loadUrl = "modalTambahSlide";
      $("#btnTambahSlide").click(function(){
          $("#modal-body-tambahSlide").load(loadUrl, function(result){
              $("#modalTambahSlide").modal({show:true});
          });
      });
    }); 

    function showEditModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalUbahSlide/" + Id;
      $("#modal-body-ubahSlide").load(loadUrl, function(result){
          $("#modalUbahSlide").modal({show:true});
      });
    }

    function showDeleteModal(cat){
      var Id = cat.id;
      $.ajaxSetup ({
          cache: false
      });      
      var loadUrl = "modalHapusSlide/" + Id;
      $("#modal-body-hapusSlide").load(loadUrl, function(result){
          $("#modalHapusSlide").modal({show:true});
      });
    }

    function turnOn(cat){
      var Id = cat.id;

      $('.btn').prop('disabled', true);
      $.ajax({
          url         : 'turnOnSlide',                                                       
          type        : 'post',
          data        : "id="+Id,
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          error : function(response)
          {
              setTimeout(function(){
                  $('.btn').prop('disabled', false);
              }, 1000);
              alert('terjadi kesalahan, diharapkan untuk melakukan refresh halaman agar dapat melanjutkan');

          },
          success : function(response)
          {
              location.reload();         
          }
      });             
    }

    function turnOff(cat){
      var Id = cat.id;

      $('.btn').prop('disabled', true);
      $.ajax({
          url         : 'turnOffSlide',                                                       
          type        : 'post',
          data        : "id="+Id,
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          error : function(response)
          {
              setTimeout(function(){
                  $('.btn').prop('disabled', false);
              }, 1000);
              alert('terjadi kesalahan, diharapkan untuk melakukan refresh halaman agar dapat melanjutkan');

          },
          success : function(response)
          {
              location.reload();         
          }
      });             
    }
  </script>
@endsection