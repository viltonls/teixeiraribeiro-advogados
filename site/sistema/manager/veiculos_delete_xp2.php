<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: veiculos_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM veiculos where id_veiculo='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['veiculo_foto1'];
$foto2_p=$dados['veiculo_foto2'];
$foto3_p=$dados['veiculo_foto3'];
$foto4_p=$dados['veiculo_foto4'];
$foto5_p=$dados['veiculo_foto5'];
$foto6_p=$dados['veiculo_foto6'];
$foto7_p=$dados['veiculo_foto7'];
$foto8_p=$dados['veiculo_foto8'];
$foto9_p=$dados['veiculo_foto9'];
$foto10_p=$dados['veiculo_foto10'];
$foto1_p=$dados['veiculo_foto11'];
$foto12_p=$dados['veiculo_foto12'];

}

 if($foto1_p!=""){
   unlink("./img_eventosfotos/$foto1_p");

}
if($foto2_p!=""){
   unlink("./img_veiculos/$foto2_p");

}

if($foto3_p!=""){
   unlink("./img_veiculos/$foto3_p");

}

if($foto4_p!=""){
   unlink("./img_veiculos/$foto4_p");

}

if($foto5_p!=""){
   unlink("./img_veiculos/$foto5_p");

}

if($foto6_p!=""){
   unlink("./img_veiculos/$foto6_p");

}

if($foto7_p!=""){
   unlink("./img_veiculos/$foto7_p");

}
if($foto8_p!=""){
   unlink("./img_veiculos/$foto8_p");

}
if($foto9_p!=""){
   unlink("./img_veiculos/$foto9_p");

}
if($foto10_p!=""){
   unlink("./img_veiculos/$foto10_p");

}
if($foto11_p!=""){
   unlink("./img_veiculos/$foto11_p");

}
if($foto12_p!=""){
   unlink("./img_veiculos/$foto12_p");

}

$sql ="DELETE FROM veiculos WHERE ID_VEICULO = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: veiculos_list.php");
   }
   Else
   {
      header("Location: veiculos_edit.php?id=".$id);
   }

?>