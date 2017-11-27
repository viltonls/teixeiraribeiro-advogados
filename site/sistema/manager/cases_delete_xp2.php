<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: cases_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM cases where id_cases='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['cases_foto'];

}

 if($foto1_p!=""){
   unlink("img_cases/$foto1_p");

}


$sql ="DELETE FROM cases WHERE ID_CASES = '$id'";
?>
 
 
<?


if(!$resultado = mysql_query($sql)) $contadora++;
         
   if($resultado)
   {
      header("Location: cases_list.php");
   }
   else
   {
     header("Location: cases_edit.php?id=".$id);
   }

?>