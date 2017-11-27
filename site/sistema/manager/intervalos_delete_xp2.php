<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: intervalos_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 
$sql ="DELETE FROM intervalos WHERE ID_INTERVALOS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: intervalos_list.php");
   }
   Else
   {
      header("Location: intervalos_edit.php?id=".$id);
   }

?>