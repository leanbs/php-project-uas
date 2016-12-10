<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalTambahKeuangan', 'method' => 'post', 'id' => 'formTambahKeuangan', 'name' =>'tambahkeuanganform']) !!}    

    <div class="form-group">
        <label>Tanggal</label>
        <div class="input-group date">
            <input type="text" class="form-control" id="Date" name="date"  onkeydown="return false"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('info', 'Keterangan') !!}
        {!! Form::textarea('info', null, [
            'class'       => 'form-control',
            'rows'        => '3',
            'cols'        => '40',
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('total', 'Jumlah') !!}
        {!! Form::text('total', null, [
            'class'         => 'form-control',
            'id'            => 'Total'
        ]) !!}
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Tambah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>       
{!! Form::close() !!}


<script type="text/javascript">
    $('#Total').maskMoney({thousands:'.', affixesStay: true, decimal:',', precision:0});
    function parseFloatOpts(num, decimal, thousands) {
        var bits = num.split(decimal, 2),
            ones = bits[0].replace(new RegExp('\\' + thousands, 'g'), '');
            ones = parseFloat(ones, 10),
            decimal = parseFloat('0.' + bits[1], 10);
            return ones + decimal;
    }

    $('#Date').datepicker({
        language: "id",
        format: 'dd/mm/yyyy',
        // startDate: '0d',
        autoclose: true
    });

    $("#btnSave").click(function(e){        
        var data = new FormData(document.forms.namedItem("tambahkeuanganform"));
        var currency = parseFloatOpts($('#Total').val(), ',', '.'); 
        if (isNaN(currency)) 
        {
            currency = '';
        }
        data.set('total', currency);
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalTambahKeuangan',                                                       
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