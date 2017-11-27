<?php
/**
 * Safe_data
 * Tratamento de dados seguros
 * 
 * @author <saulsluz@gmail.com>
 */
class Safe_data
{
	/**
	 * @access public
	 * @var string
	 */
	public $key_in ;
	/**
	 * @access public
	 * @var string
	 */
	public $key_out ;
	/**
	 * Safe_data::encode()
	 * 
	 * @param string $key
	 * @return string
	 */
	function encode( $key )
	{
		$this->key_in = $key ;
		for ( $i = 0; $i < 8; $i++ )
		{
			$key = strrev( base64_encode($key) ) ;
		}
		$this->key_out = $key ;
		return $key ;
	}
	/**
	 * Safe_data::decode()
	 * 
	 * @param string $key
	 * @return string
	 */
	function decode( $key )
	{
		$this->key_in = $key ;
		for ( $i = 0; $i < 8; $i++ )
		{
			$key = base64_decode( strrev($key) ) ;
		}
		$this->key_out = $key ;
		return $key ;
	}
	/**
	 * Safe_data::get_key()
	 * 
	 * @return string
	 */
	function get_key()
	{
		return $this->key_out ;
	}
	/**
	 * Safe_data::get_original_key()
	 * 
	 * @return string
	 */
	function get_original_key()
	{
		return $this->key_in ;
	}
	/**
	 * Safe_data::add_security()
	 * 
	 * @param mixed $key
	 * @return string
	 */
	function add_security( $key )
	{
		$this->key_in = $key ;
		$key = addslashes( $key ) ;
		$this->key_out = $key ;
		return $this->key_out ;
	}
	/**
	 * Safe_data::rem_security()
	 * 
	 * @param mixed $key
	 * @return string
	 */
	function rem_security( $key )
	{
		$this->key_in = $key ;
		$key = stripslashes( $key ) ;
		$this->key_out = $key ;
		return $this->key_out ;
	}
}
?>