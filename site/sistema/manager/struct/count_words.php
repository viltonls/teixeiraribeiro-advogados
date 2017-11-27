<?php
/**
 * Conta palavras com expressуo regular
 * @param string $sText
 * @return int
 */
function get_words_number( $sText )
{
	$nWordCount = preg_match_all( "/\w+/", $sText, $aArray ) ;
	return $nWordCount ;
}
/**
 * Conta palavras com safe explode 
 * @param string $sText
 * @return int
 */
function get_words_number_work( $sText )
{
	$aParts = explode( ' ', $sText ) ;
	$nWordCount = 0 ;
	foreach ( $aParts as $value )
	{
		if ( strlen($value) > 0 )
		{
			$nWordCount++ ;
		}
	}
	return $nWordCount ;
}
/**
 * Conta palavras com str_word_count
 * Retorna total de palavras [ou array associativo, onde
 * a chave щ a posiчуo numщrica da palavra]
 * @param string $text
 * @param bool $number
 * @return int | array
 */
function Get_words( $text, $number = true )
{
	if ( $number === true )
	{
		$number = 0 ;
	}
	else
	{
		$number = 2 ;
	}
	return str_word_count( $text, $number ) ;
}
echo Get_words( $_GET['field'] ) ;
?>