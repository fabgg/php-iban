<?php
function checkIban($string){
	$to_check = substr($string, 4).substr($string, 0,4);
	$converted = '';
	for ($i = 0; $i < strlen($to_check); $i++){
		$char = strtoupper($to_check[$i]);
		if(preg_match('/[0-9A-Z]/',$char)){
		    if(!preg_match('/\d/',$char)){
		    	$char = ord($char)-55;
		    }
	    	$converted .= $char;
		}
	}
	return (strlen($converted) > 0 && gmp_strval(gmp_mod($converted, "97")) == 1);
}
?>
