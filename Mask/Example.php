<?php
	require_once 'Mask.php' ;
	var_dump ( Mask( '99999999' , '$$$$.$$$$' , '$' ) ) ;
	var_dump ( Mask( '36000' , 'R$ ###.##' ) ) ;
	var_dump ( Mask( '36680000' , '**.***-***' , '*' ) ) ;
	var_dump ( Mask( '99999999999' , '###.###.###-##' ) ) ;