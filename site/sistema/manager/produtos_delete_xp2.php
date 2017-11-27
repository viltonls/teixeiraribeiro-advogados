<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: produtos_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM produtos where id_produtos='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['foto1_produtos'];
$foto2_p=$dados['foto2_produtos'];
$foto3_p=$dados['foto3_produtos'];
$foto4_p=$dados['foto4_produtos'];
$foto5_p=$dados['foto5_produtos'];
$foto6_p=$dados['foto6_produtos'];

}

 if($foto1_p!=""){
   unlink("./imagens/$foto1_p");

}
if($foto2_p!=""){
   unlink("./imagens/$foto2_p");

}
if($foto3_p!=""){
   unlink("./imagens/$foto3_p");

}
if($foto4_p!=""){
   unlink("./imagens/$foto4_p");

}
if($foto5_p!=""){
   unlink("./imagens/$foto5_p");

}
if($foto6_p!=""){
   unlink("./imagens/$foto6_p");

}




$sql ="DELETE FROM produtos WHERE ID_PRODUTOS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: produtos_list.php");
   }
   Else
   {
      header("Location: produtos_edit.php?id=".$id);
   }

?>