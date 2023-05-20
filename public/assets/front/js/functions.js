setTimeout(function() {   //calls click event after a certain time
  $('.loading-page').addClass('d-none')
}, 10);



// //Mask
$('#telephone').mask('(00)0000-00000');
$('#telephone2').mask('(00)0000-0000');
$('#celular').mask('(00)0000-000000');
$('#whatsapp').mask('(00)0000-00000');
$('#cpf').mask('000.000.000-00', {reverse: true});
$('#cnpj').mask('00.000.000/0000-00', {reverse: true});
$('.money').mask("#.##0,00", {reverse: true});
$('#cep').mask('00000-000');
var options = {
    onKeyPress : function(cpfcnpj, e, field, options) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        var mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
        $('#cnpjcpf').mask(mask, options);
    }
};
$('#cnpjcpf').mask('000.000.000-000', options);
