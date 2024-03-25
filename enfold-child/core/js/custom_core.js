

jQuery(document).ready(function($) {

		$('#Concelho').change(function(event) {
			//console.log( $(this).val() );
			var concelho = $(this).val();
			$('#Freguesia optgroup').hide();
			$('.nonval').hide();
			$('#Freguesia').val('0');

			$('#Freguesia').trigger('change');

			$("#Freguesia optgroup[label='"+concelho+"']").show();
		});


		$('#unidade, #Freguesia').change(function(event) {
			var uni = $('#unidade').val();
			var fre = $('#Freguesia').val();
			var price = $('#price').val();
			console.log(price);
			console.log(uni);
			console.log(fre);




			

			if ( fre !== '0') {
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




}); 