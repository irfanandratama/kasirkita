/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

total();
notNull();

$('.imagecheck-input').click(function() {
    if($(this).is(':checked')){
        $('.keranjang').append('<div class="form-group row mb-2 dipilih flex" id="'+$(this).val()+'"><label class="col-form-label text-md-left col-12 col-md-3 col-lg-8"><h6>'+$(this).attr('productname')+'</h6> @ Rp. '+$(this).attr('price')+' | <i class="text-secondary mb-2">Stock : '+$(this).attr('stock')+'</i></label><div class="col-sm-12 col-md-3"><input type="number" class="form-control currency" name="product[]" value="'+$(this).val()+'" style="display :none;"><input type="number" class="form-control currency jumlah" value="1" min="1" max="'+$(this).attr('stock')+'" name="qty[]"></div><div><a class="btn btn-icon btn-danger delete" id="'+$(this).val()+'"><i class="fas fa-trash"></i></a></div></div>');

        $('#item').val(+$('#item').val() + 1);
    }else{
        $('div').remove('#'+$(this).val());
        $('#item').val(+$('#item').val() - 1);
    }
    notNull();
});

$('a .delete').click(function() {
    $('div').remove('#'+$(this).val());
    $('.imagecheck-input', '#'+$(this).val()). prop("checked", false);
});

$('.clear').click(function() {
    $('.imagecheck-input').prop("checked", false);
    $('div').remove('.dipilih');
    $('#item').val(0);
});

$('.done').click(function()
{
    setTimeout(function(){ window.location.href="index"; }, 10000);       
});

function notNull() {
    if ($('#item').val() <= '0') {
        $('.bayar').attr('disabled', true).addClass('disabled');
        $('.keranjang').append('<div class="text-center kosong"><label class="text-secondary mb-2">&mdash; Kosong &mdash;</label></div>');
    }else {
        $('.bayar').attr('disabled', false).removeClass('disabled');
        $('.kosong').remove();
    }

};

function total()
{
    var sum = 0;
    var a = 9999999999;
    $('.amount').each(function(){
        var amount = parseInt($(this).attr('value'));
        sum += amount;
    });
    $('#total').text('Rp. '+sum.toLocaleString());
    $('#totalInput').val(sum);
    
}
