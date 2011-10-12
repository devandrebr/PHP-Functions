<?php 
	 /**
	  * Recupera todas permutações / combinações de uma matriz
	  * O limite de índices / valores no array deve ser de cinco
	  * Pois mais que isso, é provável que entre tempo de execução infinito
	  * 
	  * Copyright (C) <2011-2012>  <Andrey Knupp Vital>
	  *
	  * This program is free software: you can redistribute it and/or modify
	  * it under the terms of the GNU General Public License as published by
	  * the Free Software Foundation, either version 3 of the License, or
	  * (at your option) any later version.
	  *
	  * This program is distributed in the hope that it will be useful,
	  * but WITHOUT ANY WARRANTY; without even the implied warranty of
	  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	  * GNU General Public License for more details.
	  *
 	  * You should have received a copy of the GNU General Public License
 	  * along with this program.  If not, see <http://www.gnu.org/licenses/>.
          * @author Andrey Knupp Vital
          * @param  Array $Array 
	  * @param  Array $Permutations
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
	 