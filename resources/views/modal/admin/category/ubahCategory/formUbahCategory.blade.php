<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalUbahCategory', 'method' => 'post', 'id' => 'formUbahCategory', 'name' =>'ubahCategoryform']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nama') !!}
        {!! Form::text('name', $Category->name, [
            'class'         => 'form-control'
        ]) !!}
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Ubah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>       
{!! Form::close() !!}


<script type="text/javascript">
    $("#btnSave").click(function(e){        
        var data = new FormData(document.forms.namedItem("ubahCategoryform"));
        var id = {{ $Category->id }};
        data.append('id', id);
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalUbahCategory',                                                       
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