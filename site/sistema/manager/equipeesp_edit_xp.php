<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_equipe=$_REQUEST["id_equipe"];
$equipe_nome=$_REQUEST["equipe_nome"];
$equipe_curriculo=$_REQUEST["equipe_curriculo"];
$equipe_area=$_REQUEST["equipe_area"];
$equipe_idioma=$_REQUEST["equipe_idioma"];
$equipe_email=$_REQUEST["equipe_email"];
$equipe_socio=$_REQUEST["equipe_socio"];

// Verificamos se a acao é igual a imagem
if ($id_equipe!=""){
$id_p = $id_equipe;
$consulta=mysql_query("SELECT * FROM equipe_esp where id_equipe='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela

  $sql = "UPDATE equipe_esp SET EQUIPE_NOME='$equipe_nome', EQUIPE_CURRICULO='$equipe_curriculo', EQUIPE_AREA='$equipe_area', EQUIPE_IDIOMA='$equipe_idioma', EQUIPE_EMAIL='$equipe_email', EQUIPE_SOCIO='$equipe_socio' WHERE ID_EQUIPE='$id_equipe'";
   
}else{

   $sql = "INSERT INTO equipe_esp (EQUIPE_NOME,EQUIPE_CURRICULO,EQUIPE_AREA,EQUIPE_IDIOMA,EQUIPE_EMAIL,EQUIPE_SOCIO) VALUES ('".$equipe_nome."','".$equipe_curriculo."','".$equipe_area."','".$equipe_idioma."','".$equipe_email."','".$equipe_socio."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este Membro foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este Membro!";
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
