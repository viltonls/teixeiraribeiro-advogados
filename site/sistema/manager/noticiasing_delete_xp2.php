<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: noticiasing_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM noticias_ing where id_noticia='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela


$sql ="DELETE FROM noticias_ing WHERE ID_NOTICIA = '$id'";
?>
 
 
<?


if(!$resultado = mysql_query($sql)) $contadora++;
         
   if($resultado)
   {
      header("Location: noticiasing_list.php");
   }
   else
   {
     header("Location: noticiasing_edit.php?id=".$id);
   }

?>