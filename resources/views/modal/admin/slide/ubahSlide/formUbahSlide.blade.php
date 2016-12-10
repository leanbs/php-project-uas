<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalUbahSlide', 'method' => 'post', 'id' => 'formUbahSlide', 'name' =>'ubahSlideform']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Judul Slide') !!}
        {!! Form::text('title', $Slide->title, [
            'class'         => 'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('info', 'Keterangan Slide') !!}
        {!! Form::textarea('info', $Slide->info, [
            'class'       => 'form-control',
            'rows'        => '3',
            'cols'        => '40',
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo', 'Foto Slide') !!}
        <br>
        <img id="image-preview" class="img-thumbnail" alt="Foto produk" width="191" src="{{ $Slide->image_path .'/'. $Slide->image_name }}"><br>
        {!! Form::file('photo', ['id' => 'photo', 'accept' => 'image/*', 'class' => 'input_photo hidden']) !!}  
        <a id="trigger-upload-photo" data-toggle="tooltip" data-placement="top" title="browse.." class="btn btn-primary" style="width: 191px;">
            <i class="fa fa-image"></i>
        </a>
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Ubah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>       
{!! Form::close() !!}


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#photo').change(function () {
        readURL(this);
    });

    $("#trigger-upload-photo").click(function () {
        $("#photo").trigger('click');
    });

    $("#btnSave").click(function(e){        
        var data = new FormData(document.forms.namedItem("ubahSlideform"));
        var id = {{ $Slide->id }};
        data.append('id', id);
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalUbahSlide',                                                       
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