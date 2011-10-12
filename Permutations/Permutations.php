<?php 
	 /**
	  * Recupera todas permutações / combinações de uma matriz
	  * O limite de índices / valores no array deve ser de cinco
	  * Pois mais que isso, é provável que entre tempo de execução infinito
	  * @param Array $Array 
	  * @param Array $Permutations
	  * @throws OutOfRangeException se o número de índices / valores no array for maior que 5
	  */
	 function getCombinations ( Array $Array , Array $Permutations = Array ( ) ) {
		   static $permutedItems ;
		   $FlattenArray = Array( );
		   forEach( new RecursiveIteratorIterator ( new RecursiveArrayIterator ( $Array ) ) as $Data ) 
			     $FlattenArray [ ] = $Data ; 
			     if( count( $FlattenArray ) > 5 ) 
				  throw new OutOfRangeException( 'Não podemos gerar permutações com mais de 5 valores' );
		   $Array = array_filter ( array_unique ( $FlattenArray ) ) ;
		   if( count ( $Array ) ) {
			 for ( $i = ( count ( $Array ) - 1 ) ; $i >= 0 ; -- $i ) :
				 $newArray = $Array ;
				 $newPermutations = $Permutations ;
				 list ( $item ) = array_splice ( $newArray , $i , 1 ) ; 
				 array_unshift ( $newPermutations , $item ) ;
				 getCombinations ( $newArray , $newPermutations ) ;
			 endfor; 
			 return $permutedItems;
		   } else $permutedItems [ ] = $Permutations;
		   
	 }
	 