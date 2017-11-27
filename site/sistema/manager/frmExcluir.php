<?php
include ("conexao_teste.php");

$id = $_GET['id'];
if (isset($id))
{
	$con = mysql_query("delete from portfolio where idportfolio = ".$id);
	echo "<script>";
	echo "location.href=\"frmloc_nivel2.php\"";
	echo "</script>";
}
?>