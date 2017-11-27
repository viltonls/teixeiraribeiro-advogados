<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

//header("Location: produtos_edit.php");

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
   //unlink("./imagens/$foto1_p");
$sql ="DELETE  FOTO1_PRODUTOS FROM produtos WHERE ID_PRODUTOS = '$id'";


if($sql!=""){

   echo"Esta Excluido";
}else{ 
   echo"Não Excluido";
}

}




?>
 
 
