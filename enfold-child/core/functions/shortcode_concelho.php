<?php 

//add_shortcode( 'concelho', 'concelho_func' );
function concelho_func( $atts ) {

	$html = '';
	ob_start();




	$html .= ob_get_contents();
	ob_end_clean();
	return $html;

}

add_filter( 'cf7sg_dynamic_dropdown_custom_options','dynamic_select_260_dynamic_options',10,3);
/**
* Filter dropdown options for dynamic drodpwn list of taxonomy terms.
* @param mixed $options the opttion to filter.
* @param string $name the field name being populated.
* @param string $cf7_key  the form unique key.
* @return mixed $options return either an array of <option value>=><option label> pairs or a html string of option elements which can be grouped if required.
*/
function dynamic_select_260_dynamic_options($options, $name, $cf7_key){
  if('formulario-de-contacto-1'!==$cf7_key || 'dynamic_select-260' !== $name){
    return $options;
  }

    //$file = fopen( CORE_PATH."/csv/delivery.csv","r");
    $csv = array_map('str_getcsv', file( CORE_PATH."/csv/delivery.csv" ));
    array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
    array_shift($csv); # remove column header
    //var_dump($csv);

    $concelhos = [];

	foreach ($csv as $key => $opts) {
		array_push($concelhos, $opts["CONCELHO"]);
	}
	$concelhos = array_unique($concelhos);
	$options = '<option value=""></option>';

	  foreach ( $concelhos as $concelho ){
	    $options .= '<option value="'.$concelho.'">'.$concelho.'</option>';
	  }

  return $options;
}


add_filter( 'cf7sg_dynamic_dropdown_custom_options','dynamic_select_369_dynamic_options',10,3);
/**
* Filter dropdown options for dynamic drodpwn list of taxonomy terms.
* @param mixed $options the opttion to filter.
* @param string $name the field name being populated.
* @param string $cf7_key  the form unique key.
* @return mixed $options return either an array of <option value>=><option label> pairs or a html string of option elements which can be grouped if required.
*/
function dynamic_select_369_dynamic_options($options, $name, $cf7_key){
  if('formulario-de-contacto-1'!==$cf7_key || 'dynamic_select-369' !== $name){
    return $options;
  }

    $csv = array_map('str_getcsv', file( CORE_PATH."/csv/delivery.csv" ));
    array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
    array_shift($csv); # remove column header
    //var_dump($csv);

    $concelhos = [];

	foreach ($csv as $key => $opts) {
		array_push($concelhos, $opts["CONCELHO"]);
	}
	$concelhos = array_unique($concelhos);
	$options = '<option class="nonval" value=""></option>';


	  // foreach ( $concelhos as $key => $concelho ) {
	  // 	$class = str_replace(' ', '_', $concelho);
	  //   $options .= '<optgroup class="group_'.$class.'" label="'.$concelho.'">';
	  //   foreach ( $csv as $label => $value ) {
	  //   	if ( $value["CONCELHO"] == $concelho ) {
	  //   		$price = str_replace(',', '.', $value["Delivery price"]);
	  //   		$options .= '<option value="'.$price.'">'.$value["FREGUESIA"].'</option>';
	  //   	}
	      
	  //   }
	  //   $options .= '</optgroup>';
	  // }



  return $options;
}

add_action( 'wp_ajax_get_delivery_list', 'get_delivery_list' );
add_action( 'wp_ajax_nopriv_get_delivery_list', 'get_delivery_list' );

function get_delivery_list() {

	$term_id = $_POST['term_id'];
	//$res['term_id'] = $term_id;

    $csv = array_map('str_getcsv', file( CORE_PATH."/csv/delivery.csv" ));
    array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
    array_shift($csv); 


    $concelhos = [];

	foreach ($csv as $key => $opts) {
		array_push($concelhos, $opts["CONCELHO"]);
	}
	$concelhos = array_unique($concelhos);

	  foreach ( $concelhos as $key => $concelho ) {

	    foreach ( $csv as $label => $value ) {
	    	if ( $value["CONCELHO"] == $term_id ) {
	    		$price = str_replace(',', '.', $value["Delivery price"]);
	    		//$options .= '<option value="'.$price.'">'.$value["FREGUESIA"].'</option>';
	    		$res[$label]['price'] = $price;
	    		$res[$label]['label'] = $value["FREGUESIA"];
	    	}
	      
	    }

	  }
	  
	  $res = array_values($res);


	echo json_encode( $res );
	exit;

}