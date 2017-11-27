<?php
/**
 * Validate_form
 * Classe para validação de formulários do sistema EOL
 * 
 * @author <saulsluz@gmail.com>
 */
if(!function_exists('checkdnsrr'))
{
    function checkdnsrr($hostName, $recType = '')
    {
     if(!empty($hostName)) {
       if( $recType == '' ) $recType = "MX";
       exec("nslookup -type=$recType $hostName", $result);
       // check each line to find the one that starts with the host
       // name. If it exists then the function succeeded.
       foreach ($result as $line) {
         if(eregi("^$hostName",$line)) {
           return true;
         }
       }
       // otherwise there was no mail handler for the domain
       return false;
     }
     return false;
    }
}
class Validate_form
{
	/**
	 * @access public
	 * @var array
	 */
	public $input ;
	/**
	 * @access public
	 * @var array
	 */
	public $output ;
	/**
	 * @access public
	 * @var array
	 */
	public $invalid_fields ;
	/**
	 * @access public
	 * @var array
	 */
	public $values_field ;
	/**
	 * Validate_form::add_field()
	 * 
	 * @param array $field
	 * @return void
	 */
	function add_field( $field )
	{
		$this->input[] = $field ;
	}
	/**
	 * Validate_form::valid_form()
	 * 
	 * @return bool
	 */
	function valid_form()
	{
		foreach ( $this->input as $field )
		{
			$obj = new Field( $field ) ;
			$this->output[] = $obj ;
			$this->values_field[$obj->name] = $obj->value ;
			if ( ! $obj->status )
			{
				$this->invalid_fields[$obj->name] = $obj->message ;
			}
		}
		return empty( $this->invalid_fields ) ;
	}
	/**
	 * Validate_form::get_values_field()
	 * 
	 * @return array
	 */
	function get_values_field()
	{
		return $this->values_field ;
	}
	/**
	 * Validate_form::get_invalid_fields()
	 * 
	 * @return array
	 */
	function get_invalid_fields()
	{
		return $this->invalid_fields ;
	}
}
/**
 * Field
 * 
 * @author <saulsluz@gmail.com>
 */
class Field
{
	/**
	 * @access public
	 * @var string
	 */
	public $name ;
	/**
	 * @access public
	 * @var string
	 */
	public $id ;
	/**
	 * @access public
	 * @var string | int
	 */
	public $value ;
	/**
	 * @access public
	 * @var string
	 */
	public $type ;
	/**
	 * @access public
	 * @var string
	 */
	public $message ;
	/**
	 * @access public
	 * @var string
	 */
	public $method ;
	/**
	 * @access public
	 * @var bool
	 */
	public $status ;
	/**
	 * Field::__construct()
	 * 
	 * @param array $field
	 * @return array
	 */
	function __construct( $field )
	{
		$this->set_field( $field ) ;
		switch ( $this->type )
		{
			case 'required':
				$this->is_required() ;
				break ;
			case 'email':
				$this->is_email() ;
				break ;
			case 'keep':
				$this->is_keep() ;
				break ;
			case 'file':
				$this->is_file() ;
				break ;
			case 'number':
				$this->is_number() ;
				break ;
		}
		return $this->get_field() ;
	}
	/**
	 * Field::set_field()
	 * 
	 * @param array $field
	 * @return void
	 */
	function set_field( $field )
	{
		$this->name = $field['name'] ;
		if ( array_key_exists('id', $field) )
		{
			$this->id = $field['id'] ;
		}
		else
		{
			// default id : fieldname
			$this->id = $field['name'] ;
		}
		if ( array_key_exists('message', $field) )
		{
			$this->message = $field['message'] ;
		}
		else
		{
			// default message : standard message + fieldname
			$this->message = 'Campo ' . $this->name . ' inválido.' ;
		}
		if ( array_key_exists('type', $field) )
		{
			$this->type = $field['type'] ;
		}
		else
		{
			// default type : required
			$this->type = 'required' ;
		}
		if ( array_key_exists('method', $field) )
		{
			$this->method = $field['method'] ;
		}
		else
		{
			// default method : post
			$this->method = 'post' ;
		}
		$this->status = null ;
		switch ( $this->method )
		{
			case 'post':
				$this->value = $_POST[$this->name] ;
				break ;
			case 'get':
				$this->value = $_GET[$this->name] ;
				break ;
			case 'file':
				$this->value = $_FILES[$this->name]['tmp_name'] ;
				break ;
			default:
				$this->value = null ;
		}
	}
	/**
	 * Field::get_field()
	 * 
	 * @return array
	 */
	function get_field()
	{
		return $this ;
	}
	/**
	 * Field::is_required()
	 * 
	 * @return void
	 */
	function is_required()
	{
		if ( ! empty($this->value) )
		{
			$this->status = true ;
		}
		else
		{
			$this->status = false ;
		}
	}
	/**
	 * Field::is_email()
	 * 
	 * @return void
	 */
	function is_email()
	{
		$this->is_required() ;
		if ( $this->status == true )
		{
			if ( $this->check_email_mx($this->value) == true )
			{
				$this->status = true ;
			}
			else
			{
				$this->status = false ;
			}
		}
	}
	/**
	 * Field::check_email_mx()
	 * 
	 * @author Melvin D. Nava
	 * @param string $email
	 * @return bool
	 */
	function check_email_mx( $email )
	{
		if ( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/', $email)) )
		{
			$host = explode( '@', $email ) ;
			if ( checkdnsrr($host[1] . '.', 'MX') ) return true ;
			if ( checkdnsrr($host[1] . '.', 'A') ) return true ;
			if ( checkdnsrr($host[1] . '.', 'CNAME') ) return true ;
		}
		return false ;
	}
	/**
	 * Field::is_keep()
	 * 
	 * @return void
	 */
	function is_keep()
	{
		$this->status = true ;
	}
	/**
	 * Field::is_file()
	 * 
	 * @return void
	 */
	function is_file()
	{
		if ( file_exists($this->value) )
		{
			$this->status = true ;
		}
		else
		{
			$this->status = false ;
		}
	}
	/**
	 * Field::is_number()
	 * 
	 * @return void
	 */
	function is_number()
	{
		if ( is_numeric($this->value) )
		{
			$this->status = true ;
		}
		else
		{
			$this->status = false ;
		}
	}
}
?>