<? include_once("struct/auth.php")?>
<?
$id=$_REQUEST["id"];

header("Location: eventosfotos_list.php");

?>
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
//$consulta=mysql_query("SELECT * FROM temas order by id_temas ASC"); 

$consulta=mysql_query("SELECT * FROM eventosfotos where id_eventosfotos='$id'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['eventosfotos_foto1'];
$foto2_p=$dados['eventosfotos_foto2'];
$foto3_p=$dados['eventosfotos_foto3'];
$foto4_p=$dados['eventosfotos_foto4'];
$foto5_p=$dados['eventosfotos_foto5'];
$foto6_p=$dados['eventosfotos_foto6'];
$foto7_p=$dados['eventosfotos_foto7'];
$foto8_p=$dados['eventosfotos_foto8'];
$foto9_p=$dados['eventosfotos_foto9'];
$foto10_p=$dados['eventosfotos_foto10'];
$foto11_p=$dados['eventosfotos_foto11'];
$foto12_p=$dados['eventosfotos_foto12'];
$foto13_p=$dados['eventosfotos_foto13'];
$foto14_p=$dados['eventosfotos_foto14'];
$foto15_p=$dados['eventosfotos_foto15'];
$foto16_p=$dados['eventosfotos_foto16'];
$foto17_p=$dados['eventosfotos_foto17'];
$foto18_p=$dados['eventosfotos_foto18'];
$foto19_p=$dados['eventosfotos_foto19'];
$foto20_p=$dados['eventosfotos_foto20'];

}

 if($foto1_p!=""){
   unlink("./img_eventosfotos/$foto1_p");

}
if($foto2_p!=""){
   unlink("./img_eventosfotos/$foto2_p");

}

if($foto3_p!=""){
   unlink("./img_eventosfotos/$foto3_p");

}

if($foto4_p!=""){
   unlink("./img_eventosfotos/$foto4_p");

}

if($foto5_p!=""){
   unlink("./img_eventosfotos/$foto5_p");

}

if($foto6_p!=""){
   unlink("./img_eventosfotos/$foto6_p");

}

if($foto7_p!=""){
   unlink("./img_eventosfotos/$foto7_p");

}
if($foto8_p!=""){
   unlink("./img_eventosfotos/$foto8_p");

}
if($foto9_p!=""){
   unlink("./img_eventosfotos/$foto9_p");

}
if($foto10_p!=""){
   unlink("./img_eventosfotos/$foto10_p");

}
if($foto11_p!=""){
   unlink("./img_eventosfotos/$foto11_p");

}
if($foto12_p!=""){
   unlink("./img_eventosfotos/$foto12_p");

}
if($foto13_p!=""){
   unlink("./img_eventosfotos/$foto13_p");

}

if($foto14_p!=""){
   unlink("./img_eventosfotos/$foto14_p");

}

if($foto15_p!=""){
   unlink("./img_eventosfotos/$foto15_p");

}

if($foto16_p!=""){
   unlink("./img_eventosfotos/$foto16_p");

}
if($foto17_p!=""){
   unlink("./img_eventosfotos/$foto17_p");

}
if($foto18_p!=""){
   unlink("./img_eventosfotos/$foto18_p");

}
if($foto19_p!=""){
   unlink("./img_eventosfotos/$foto19_p");

}
if($foto20_p!=""){
   unlink("./img_eventosfotos/$foto20_p");

}


$sql ="DELETE FROM eventosfotos WHERE ID_EVENTOSFOTOS = '$id'";
?>
 
 
<?


If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: eventosfotos_list.php");
   }
   Else
   {
      header("Location: eventosfotos_edit.php?id=".$id);
   }

?>