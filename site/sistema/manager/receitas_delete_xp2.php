<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: receitas_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC");
$consulta=mysql_query("SELECT * FROM receitas where id_receitas='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_r=$dados['foto1_receitas'];
$foto2_r=$dados['foto2_receitas'];
$foto3_r=$dados['foto3_receitas'];
$foto4_r=$dados['foto4_receitas'];
$foto5_r=$dados['foto5_receitas'];
$foto6_r=$dados['foto6_receitas'];

} 
 if($foto1_r!=""){
   unlink("./imagens_r/$foto1_r");

}
if($foto2_r!=""){
   unlink("./imagens_r/$foto2_r");

}
if($foto3_r!=""){
   unlink("./imagens_r/$foto3_r");

}
if($foto4_r!=""){
   unlink("./imagens_r/$foto4_r");

}
if($foto5_r!=""){
   unlink("./imagens_r/$foto5_r");

}
if($foto6_r!=""){
   unlink("./imagens_r/$foto6_r");

}

$sql ="DELETE FROM receitas WHERE ID_RECEITAS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: receitas_list.php");
   }
   Else
   {
      header("Location: receitas_edit.php?id=".$id);
   }

?>