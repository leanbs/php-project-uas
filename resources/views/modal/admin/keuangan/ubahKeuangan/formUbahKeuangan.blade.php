<div id="modal-alert-success" class="alert alert-success alert-dismissable" hidden role="alert"></div>
<div id="modal-alert-fail" class="alert alert-danger alert-dismissable" hidden role="alert"></div>

{!! Form::open(['url' => 'modalUbahKeuangan', 'method' => 'post', 'id' => 'formUbahKeuangan', 'name' =>'ubahkeuanganform']) !!}
    <div class="form-group">
        <label>Tanggal</label>
        <div class="input-group date">
            <input type="text" class="form-control" id="Date" name="date"  onkeydown="return false" value="{{ $Keuangan->date }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('info', 'Keterangan') !!}
        {!! Form::textarea('info', $Keuangan->info, [
            'class'       => 'form-control',
            'rows'        => '3',
            'cols'        => '40',
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('total', 'Jumlah') !!}
        {!! Form::text('total', number_format($Keuangan->total, 0, ",", "."), [
            'class'         => 'form-control',
            'id'            => 'Total'
        ]) !!}
    </div>

    <div class="modal-footer">
        <div class="form-group">
            {!! Form::submit('Ubah', ['id' => 'btnSave', 'class' => 'btn btn-success btn-block']) !!}
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
        var data = new FormData(document.forms.namedItem("ubahkeuanganform"));
        var currency = parseFloatOpts($('#Total').val(), ',', '.'); 
        if (isNaN(currency)) 
        {
            currency = '';
        }
        var id = {{ $Keuangan->id }};
        data.append('id', id);
        data.set('total', currency);
        $('.form-control').prop('disabled', true);
        $.ajax({
            url         : 'modalUbahKeuangan',                                                       
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