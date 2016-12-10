<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalTambahKegiatan', 'method' => 'post', 'id' => 'formTambahKegiatan', 'name' =>'tambahkegiatanform']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nama Kegiatan') !!}
        {!! Form::text('name', null, [
            'class'         => 'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        <label>Tanggal Kegiatan</label>
        <div class="input-group date">
            <input type="text" class="form-control" id="Date" name="date"  onkeydown="return false"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('info', 'Keterangan Kegiatan') !!}
        {!! Form::textarea('info', null, [
            'class'       => 'form-control',
            'rows'        => '3',
            'cols'        => '40',
        ]) !!}
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Tambah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>       
{!! Form::close() !!}


<script type="text/javascript">
    $('#Date').datepicker({
        language: "id",
        format: 'dd/mm/yyyy',
        startDate: '0d',
        autoclose: true
    });

    $("#btnSave").click(function(e){        
        var data = new FormData(document.forms.namedItem("tambahkegiatanform"));
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalTambahKegiatan',                                                       
            type        : 'post',
            data        : data,
            contentType : false,
            processData : false,
            error : function(response)
            {
                setTimeout(function(){
                    $('.form-control').prop('disabled', false);
                    // sample delay
                }, 1000);
                var error = response.responseJSON;
                var errorHtml = '<ul>';
                $.each(error, function(key, value){
                    errorHtml += '<li>' + value[0] + '</li>';
                });
                errorHtml += '</ul>';
                $('#modal-alert-fail').html(errorHtml).fadeIn('slow');


            },
            success : function(response)
            {
                location.reload();
            }
        });             
        e.preventDefault();                   
    }); 
</script>