$('.control-cpf').mask('000.000.000-00');
$('.control-date').mask('00/00/0000');
$('.control-cep').mask('00000-000');
$('.control-phone_1').mask('(00) 0000-0000');
$('.control-phone_2').mask('(00) 00000-0000');
$('.control-number').mask('000000');
$('.control-number-2').mask('00');
$('.control-money').mask('999.999,99', {reverse: true});

$(document).on('click', 'tr[data-href]', function(e) {
    if (!$(e.target).is('a')) {
        if($(this).attr('data-target') === '_blank'){
            window.open($(this).attr('data-href'), '_blank');
        }else {
            window.location = $(this).attr('data-href');
        }
    }
});

$('.form-control').attr('autocomplete', 'nope');
