<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

?>

<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 
$sql ="DELETE FROM temas WHERE ID_TEMAS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: temas_list.php");
   }
   Else
   {
      header("Location: temas_edit.php?id=".$id);
   }

?>