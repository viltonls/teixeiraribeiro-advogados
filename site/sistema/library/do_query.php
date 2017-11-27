<?php

/**
 * @author <saulsluz@gmail.com>
 * @param string
 * @return mixed
 */
function do_query($query)
{
	$con = mysql_connect("mysql03.eventoonline.com", "eventoonline2", "el45j5gh1");
	if (! $con)
	{
		die('Could not connect: '.mysql_error());
	}

	mysql_select_db("eventoonline", $con);

	$result = mysql_query($query);

	$values = array();

	while ($row = @mysql_fetch_object($result))
	{
		$values[] = $row;
	}

	mysql_close($con);

	return $values;
}

?>