var main= function () {
  $('#shop').hide();
  $('#dress').hide();
  $('#shoes').hide();
  $('#jewelery').hide();
  $('#bags').hide();
  $('#vintage').hide();
  $('#others').hide();
  $('#ads').hide();
  $('#product1').hide();

  $('#dressid').on('click', function(){
    $('#dress').show();
    $('#home').hide();
    $('#aboutus').hide();
    $('#contantus').hide();
    $('#singup').hide();
    $('#singin').hide();
    $('#shop').hide();
    $('#shoes').hide();
    $('#jewelery').hide();
    $('#bags').hide();
    $('#vintage').hide();
    $('#others').hide();
      $('#ads').hide();
  });

    $('#shoesid').on('click', function(){
      $('#shoes').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shop').hide();
      $('#jewelery').hide();
      $('#bags').hide();
      $('#vintage').hide();
      $('#others').hide();
        $('#ads').hide();
    });

    $('#jeweleryid').on('click', function(){
      $('#jewelery').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#shop').hide();
      $('#bags').hide();
      $('#vintage').hide();
      $('#others').hide();
        $('#ads').hide();
    });

    $('#bagsid').on('click', function(){
      $('#bags').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#jewelery').hide();
      $('#shop').hide();
      $('#vintage').hide();
      $('#others').hide();
        $('#ads').hide();
    });

    $('#vintageid').on('click', function(){
      $('#vintage').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#jewelery').hide();
      $('#bags').hide();
      $('#shop').hide();
      $('#others').hide();
        $('#ads').hide();
    });

    $('#othersid').on('click', function(){
      $('#others').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#jewelery').hide();
      $('#bags').hide();
      $('#vintage').hide();
      $('#shop').hide();
      $('#ads').hide();
    });

    $('#adsid').on('click', function(){
      $('#ads').show();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#jewelery').hide();
      $('#bags').hide();
      $('#vintage').hide();
      $('#shop').hide();
    });

    $('.icon-eye').on('click', function(){
      $('#product1').show();
      $('#ads').hide();
      $('#home').hide();
      $('#aboutus').hide();
      $('#contantus').hide();
      $('#singup').hide();
      $('#singin').hide();
      $('#dress').hide();
      $('#shoes').hide();
      $('#jewelery').hide();
      $('#bags').hide();
      $('#vintage').hide();
      $('#shop').hide();
    });

	$('.shop2').on('click', function(){
		$('#shop').hide();
    $('#ads').hide();
    $('#dress').hide();
    $('#vintage').hide();
    $('#jewelery').hide();
    $('#bags').hide();
    $('#shoes').hide();
    $('#others').hide();
		$('#home').show();
		$('#aboutus').show();
		$('#contantus').show();
		$('#singup').show();
		$('#singin').show();
    $('#product1').show();

	});

};



$(document).ready(main);
