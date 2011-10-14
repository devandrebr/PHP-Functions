<?php 
  
	 /**
	  * Recupera todas permutações de uma matriz
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
    * @param  Array   $Array 
	  * @param  Array   $Permutations
    * @param  Integer $limitOffset
	  * @throws OutOfRangeException se o número de índices / valores no array for maior que $limitOffset
    */
	 function getPermutations ( Array $Array , Array $Permutations = Array ( ) , $limitOffset = 5 ) {
		   static $permutedItems = Array ( ) ;
		   $FlattenArray = Array ( );
		   forEach( new RecursiveIteratorIterator ( new RecursiveArrayIterator ( $Array ) ) as $Data ) 
			     $FlattenArray [ ] = $Data ; 
			     if( count( $FlattenArray ) > ( intval( $limitOffset ) ) ) 
				  throw new LengthException ( sprintf( 'Não podemos gerar permutações com mais de %d valores' , $limitOffset ) );
		   $Array = array_filter ( array_unique ( $FlattenArray ) ) ;
		   if( count ( $Array ) ) {
                          for ( $i = 0; $i <= ( count ( $Array ) - 1 );  ++ $i ) {
				 $newArray = $Array ;
				 $newPermutations = $Permutations ;
				 array_push ( $newPermutations , array_shift ( array_splice ( $newArray , $i , 1 ) ) ) ;
				 getPermutations ( $newArray , $newPermutations , $limitOffset ) ;
			  } 
			  return $permutedItems;
		   } else $permutedItems [ ] = $Permutations;
		   
	 }
	 