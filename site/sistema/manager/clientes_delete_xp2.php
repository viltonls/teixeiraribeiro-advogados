<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: clientes_delete_xp2.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM clientes where id_clientes='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['clientes_logo'];

}

 if($foto1_p!=""){
   unlink("./img_clientes/$foto1_p");

}


$sql ="DELETE FROM clientes WHERE ID_CLIENTES = '$id'";
?>
 
 
<?


if(!$resultado = mysql_query($sql)) $contadora++;
         
   if($resultado)
   {
      header("Location: clientes_list.php");
   }
   else
   {
     header("Location: clientes_edit.php?id=".$id);
   }

?>