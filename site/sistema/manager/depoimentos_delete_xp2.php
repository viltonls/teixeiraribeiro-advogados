<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: depoimentos_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM depoimentos where id_depoimentos='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['depoimentos_foto'];

}

 if($foto1_p!=""){
   unlink("./img_depoimentos/$foto1_p");

}


$sql ="DELETE FROM depoimentos WHERE ID_DEPOIMENTOS = '$id'";
?>
 
 
<?


if(!$resultado = mysql_query($sql)) $contadora++;
         
   if($resultado)
   {
      header("Location: depoimentos_list.php");
   }
   else
   {
     header("Location: depoimentos_edit.php?id=".$id);
   }

?>