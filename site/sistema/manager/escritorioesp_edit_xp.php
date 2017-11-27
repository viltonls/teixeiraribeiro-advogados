<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_escritorio=$_REQUEST["id_escritorio"];

$apresentacao=$_REQUEST["apresentacao"];
$missao=$_REQUEST["missao"];
$visao=$_REQUEST["visao"];
$codigo=$_REQUEST["codigo"];
$parcerias=$_REQUEST["parcerias"];


// Verificamos se a acao é igual a imagem
if ($id_escritorio!=""){
$id_p = $id_escritorio;
$consulta=mysql_query("SELECT * FROM escritorio_esp where id_escritorio='$id_p'"); 
while ($dados = mysql_fetch_array($consulta)) {
$id_escritorio=$dados['id_escritorio'];
}


  $sql = "UPDATE escritorio_esp SET APRESENTACAO='$apresentacao', MISSAO='$missao', VISAO='$visao', CODIGO='$codigo', PARCERIAS='$parcerias' WHERE ID_ESCRITORIO='$id_escritorio'";
   
}else{




   $sql = "INSERT INTO escritorio_esp (APRESENTACAO,MISSAO,VISAO,CODIGO,PARCERIAS) VALUES ('".$apresentacao."','".$missao."','".$visao."','".$codigo."','".$parcerias."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"As alterações foram salvas com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"As alterações não foram salvas!";
	  //echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }
//echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
//$nome_da_imagem = $handle->file_dst_name;

//echo $nome_da_imagem;
///echo"$foto1_produtos";
?> 
</body>

</html>
