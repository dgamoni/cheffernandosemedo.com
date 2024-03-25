

jQuery(document).ready(function($) {

var isSafari = /constructor/i.test(window.HTMLElement);
console.log(isSafari);
	


		$('#Concelho').change(function(event) {
			console.log( $(this).val() );

			var term_id = $(this).val();
			jQuery.ajax({
				url     : '/wp-admin/admin-ajax.php',
				type    : 'POST',
				dataType: 'json',
				data    : {
					'action': 'get_delivery_list',
					'term_id': term_id
				},
				success : function (response) {
					console.log(response);
					$('#Freguesia').val('');
					var select = $('#Freguesia');
					select.find('option').not('.nonval').remove();

					//console.log(response.length);
					for( var i=0; i<response.length; i++ ) {
						//console.log(response[i]);
					  var option = $("<option></option>");
					  $(option).val(response[i]['price']);
					  $(option).html(response[i]['label']);
					  //console.log(option);
					  $('#Freguesia').append(option);
					}

					$('#Freguesia').trigger('change');
				
				}
			});

		});






		// $('#Concelho').change(function(event) {
		// 	//console.log( $(this).val() );
		// 	var concelho = $(this).val();
		// 	$('#Freguesia optgroup').hide();
		// 	$('.nonval').hide();
		// 	$('#Freguesia').val('');

		// 	$('#Freguesia').trigger('change');

		// 	$("#Freguesia optgroup[label='"+concelho+"']").show();
		// });


		$('#unidade, #Freguesia').change(function(event) {
			var uni = $('#unidade').val();
			var fre = $('#Freguesia').val();
			var price = $('#price').val();
			console.log(price);
			console.log(uni);
			console.log( fre);
			console.log( fre.length);

			var fre_label = $('#Freguesia option:selected').text();




			
			if ( fre !== '') {
			//if ( fre !== '0') {
				console.log('fre ok');
				$('#Freguesia').attr('data-valid', 'valid');

				var total = new Number(uni) * new Number(price) + new Number(fre);
				$('.total_input').val( '€'+total.toFixed(2) );
				$('.entegra_input').val( fre );
				$('#Freguesia_label').val( fre_label );


			} else {
				console.log('fre not ok');
				var total = new Number(uni) * new Number(price);
				$('.total_input').val( '€'+total.toFixed(2) );
				$('.entegra_input').val( '0' );	
				$('#Freguesia_label').val('');			
			}
			

		});


		// $('.order_paginate .p2, .avançar').click(function(event) {
		$('.avançar').click(function(event) {	
			var fre = $('#Freguesia').val();
			if ( fre !== '') {
				$('.order_paginate .p1').removeClass('active');
				$('.order_paginate .p2').addClass('active');
				$('.order_form_part_1').hide();
				$('.order_form_part_2').show();
				$('.politica_wrap').css('visibility', 'visible');
				$('.enivar_input').show();
				$('.avançar').hide();
				$('.politica_wrap').addClass('politica_wrap_p2');
				$('.politica_wrap').removeClass('politica_wrap_p1');
			} else {
				$('#Freguesia').attr('data-valid', 'novalid');
				$('.wpcf7-response-output').text('Um ou mais campos com erros. Por favor, verifique e tente de novo.').show();
			}

		});

		// $('.order_paginate .p1').click(function(event) {
		// 	$('.order_paginate .p2').removeClass('active');
		// 	$(this).addClass('active');
		// 	$('.order_form_part_2').hide();
		// 	$('.order_form_part_1').show();
		// 	$('.politica_wrap').css('visibility', 'hidden');
		// 	$('.enivar_input').hide();
		// 	$('.avançar').show();
		// 	$('.politica_wrap').addClass('politica_wrap_p1');
		// 	$('.politica_wrap').removeClass('politica_wrap_p2');
		// });

	    $('#nif').keyup(function() {

	    	var niff = $(this).val();
	    	var townfilter = $(this);
		        if (isValidUSZip(niff)) {
		            townfilter.attr('data-valid', 'valid');
		        }  else {
		            $(this).attr('data-valid', 'novalid');
		        }
		        

	    });

	    function isValidUSZip(sZip) {
		   return /^\d{9}(-\d{8})?$/.test(sZip);
		}

}); 