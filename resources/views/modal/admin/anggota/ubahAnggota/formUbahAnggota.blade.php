<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalUbahAnggota', 'method' => 'post', 'id' => 'formUbahAnggota', 'name' =>'ubahanggotaform']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nama') !!}
        {!! Form::text('name', $user->name, [
            'class'         => 'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('call_number', 'No Telp') !!}
        {!! Form::text('call_number', $user->no_telp, [
            'class'         => 'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', 'Alamat') !!}
        {!! Form::textarea('address', $user->address, [
            'class'       => 'form-control',
            'rows'        => '3',
            'cols'        => '40',
        ]) !!}
    </div>

    <div class="form-group">
        <label>Role</label>
        <select class="form-control" name="role">
            <option value="1" <?php if($user->role == '1') echo"selected"; ?>>Admin</option>
            <option value="2" <?php if($user->role == '2') echo"selected"; ?>>User</option>
        </select>
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Ubah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>       
{!! Form::close() !!}


<script type="text/javascript">
    $("#btnSave").click(function(e){        
        var data = new FormData(document.forms.namedItem("ubahanggotaform"));
        var id = {{ $user->id }};
        data.append('id', id);
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalUbahAnggota',                                                       
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