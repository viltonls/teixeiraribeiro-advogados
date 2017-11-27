<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: palestras_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 
$sql ="DELETE FROM palestras WHERE ID_PALESTRAS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: palestras_list.php");
   }
   Else
   {
      header("Location: palestras_edit.php?id=".$id);
   }

?>