<?php

/**
 * Recebe nome do campo POST e salva em array SESSION
 * empty_field para vazios e fill_field para preenchidos
 * é importante desregistrar as variavies de sessão depois
 * de cada uso/retorno
 * @author <saulsluz@gmail.com>
 * @param string fieldname of $_POST[fieldname]
 * @return array $_SESSION[empty_field]
 * @return array $_SESSION[fill_field]
 */
function check_empty_field($fieldname)
{
	if (! $_POST[$fieldname])
	{
		$_SESSION[empty_field][] = $fieldname;
	}
	else
	{
		$_SESSION[fill_field][$fieldname] = $_POST[$fieldname];
	}
}

?>