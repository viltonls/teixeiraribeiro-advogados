<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_area=$_REQUEST["id_area"];
$area_titulo=$_REQUEST["area_titulo"];

$area_corpo=$_REQUEST["area_corpo"];
$area_curto=$_REQUEST["area_curto"];

// Verificamos se a acao é igual a imagem
if ($id_area!=""){
$id_p = $id_area;
$consulta=mysql_query("SELECT * FROM areas_ita where id_area='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela

  $sql = "UPDATE areas_ita SET AREA_TITULO='$area_titulo', AREA_CORPO='$area_corpo', AREA_CURTO='$area_curto' WHERE ID_AREA='$id_area'";
   
}else{

   $sql = "INSERT INTO areas_ita (AREA_TITULO,AREA_CORPO,AREA_CURTO) VALUES ('".$area_titulo."','".$area_corpo."','".$area_curto."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Esta Área foi salva com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salva esta Área!";
	  //echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }
//echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
$nome_da_imagem = $handle->file_dst_name;

//echo $nome_da_imagem;
///echo"$foto1_produtos";
?> 
</body>

</html>
