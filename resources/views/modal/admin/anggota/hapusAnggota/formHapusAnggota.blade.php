<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

<p style="text-align: center; color: red;">Apakah Anda yakin ingin menghapus data ini?</p>	
<div class="modal-footer">
	{!! Form::open(['url' => 'modalHapusAnggota', 'method' => 'post', 'name' =>'hapusanggotaform']) !!}
	    {!! Form::submit('Yes', ['class' => 'btn pull-left btn-danger btn-block', 'id' => 'iya' ]) !!}
	    {!! Form::button('No', ['class' => 'btn btn-success btn-block', 'data-dismiss' => 'modal' ]) !!}
	{!! Form::close() !!}
</div>

<script type="text/javascript">
	// delete
    $(function(){
        var id = {{ $id }};
        $("#iya").click(function(e){     
            $('#iya').prop('disabled', true);
            $.ajax({
                url         : 'modalHapusAnggota',                                                       
                type        : 'post',
                data        : "id="+id,
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                error : function(response)
                {
                    setTimeout(function(){
                        $('#iya').prop('disabled', false);
                    }, 1000);
                    var error = response.responseJSON;
                    var errorHtml = '<ul>';
                    errorHtml += '<li>terjadi kesalahan, diharapkan untuk melakukan refresh halaman agar dapat melanjutkan</li>';
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
    });
</script>