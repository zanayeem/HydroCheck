<?php  

	spl_autoload_register(function($className){
	    $classLink =   $className . ".php";

	    if( !file_exists( $classLink ) ){
	        return false;
	    }

	    include_once $className . ".php";


	});

?>