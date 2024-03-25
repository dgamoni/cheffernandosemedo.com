

jQuery(document).ready(function($) {

		$('#Concelho').change(function(event) {
			//console.log( $(this).val() );
			var concelho = $(this).val();
			$('#Freguesia optgroup').hide();
			$('.nonval').hide();
			$('#Freguesia').val('');

			$('#Freguesia').trigger('change');

			$("#Freguesia optgroup[label='"+concelho+"']").show();
		});


		$('#unidade, #Freguesia').change(function(event) {
			var uni = $('#unidade').val();
			var fre = $('#Freguesia').val();
			var price = $('#price').val();
			console.log(price);
			console.log(uni);
			console.log( fre);
			console.log( fre.length);




			
			if ( fre !== '') {
			//if ( fre !== '0') {
				console.log('fre ok');

				var total = new Number(uni) * new Number(price) + new Number(fre);
				$('.total_input').val( '€'+total.toFixed(2) );
				$('.entegra_input').val( fre );


			} else {
				console.log('fre not ok');
				var total = new Number(uni) * new Number(price);
				$('.total_input').val( '€'+total.toFixed(2) );
				$('.entegra_input').val( '0' );				
			}
			

		});


		$('.order_paginate .p2, .avançar').click(function(event) {
			$('.order_paginate .p1').removeClass('active');
			$('.order_paginate .p2').addClass('active');
			$('.order_form_part_1').hide();
			$('.order_form_part_2').show();
			$('.politica_wrap').css('visibility', 'visible');
			$('.enivar_input').show();
			$('.avançar').hide();
		});

		$('.order_paginate .p1').click(function(event) {
			$('.order_paginate .p2').removeClass('active');
			$(this).addClass('active');
			$('.order_form_part_2').hide();
			$('.order_form_part_1').show();
			$('.politica_wrap').css('visibility', 'hidden');
			$('.enivar_input').hide();
			$('.avançar').show();
		});

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