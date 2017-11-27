<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_showroom=$_REQUEST["id_showroom"];

$showroom_nome1=$_REQUEST["showroom_nome1"];
$showroom_codigo1=$_REQUEST["showroom_codigo1"];
$showroom_valor1=$_REQUEST["showroom_valor1"];
$showroom_nome2=$_REQUEST["showroom_nome2"];
$showroom_codigo2=$_REQUEST["showroom_codigo2"];
$showroom_valor2=$_REQUEST["showroom_valor2"];
$showroom_nome3=$_REQUEST["showroom_nome3"];
$showroom_codigo3=$_REQUEST["showroom_codigo3"];
$showroom_valor3=$_REQUEST["showroom_valor3"];
$showroom_nome4=$_REQUEST["showroom_nome4"];
$showroom_codigo4=$_REQUEST["showroom_codigo4"];
$showroom_valor4=$_REQUEST["showroom_valor4"];
$showroom_nome5=$_REQUEST["showroom_nome5"];
$showroom_codigo5=$_REQUEST["showroom_codigo5"];
$showroom_valor5=$_REQUEST["showroom_valor5"];
$showroom_nome6=$_REQUEST["showroom_nome6"];
$showroom_codigo6=$_REQUEST["showroom_codigo6"];
$showroom_valor6=$_REQUEST["showroom_valor6"];
$showroom_nome7=$_REQUEST["showroom_nome7"];
$showroom_codigo7=$_REQUEST["showroom_codigo7"];
$showroom_valor7=$_REQUEST["showroom_valor7"];
$showroom_nome8=$_REQUEST["showroom_nome8"];
$showroom_codigo8=$_REQUEST["showroom_codigo8"];
$showroom_valor8=$_REQUEST["showroom_valor8"];
$showroom_nome9=$_REQUEST["showroom_nome9"];
$showroom_codigo9=$_REQUEST["showroom_codigo9"];
$showroom_valor9=$_REQUEST["showroom_valor9"];
$showroom_nome10=$_REQUEST["showroom_nome10"];
$showroom_codigo10=$_REQUEST["showroom_codigo10"];
$showroom_valor10=$_REQUEST["showroom_valor10"];
$showroom_nome11=$_REQUEST["showroom_nome11"];
$showroom_codigo11=$_REQUEST["showroom_codigo11"];
$showroom_valor11=$_REQUEST["showroom_valor11"];
$showroom_nome12=$_REQUEST["showroom_nome12"];
$showroom_codigo12=$_REQUEST["showroom_codigo12"];
$showroom_valor12=$_REQUEST["showroom_valor12"];
$showroom_nome13=$_REQUEST["showroom_nome13"];
$showroom_codigo13=$_REQUEST["showroom_codigo13"];
$showroom_valor13=$_REQUEST["showroom_valor13"];
$showroom_nome14=$_REQUEST["showroom_nome14"];
$showroom_codigo14=$_REQUEST["showroom_codigo14"];
$showroom_valor14=$_REQUEST["showroom_valor14"];
$showroom_nome15=$_REQUEST["showroom_nome15"];
$showroom_codigo15=$_REQUEST["showroom_codigo15"];
$showroom_valor15=$_REQUEST["showroom_valor15"];
$showroom_nome16=$_REQUEST["showroom_nome16"];
$showroom_codigo16=$_REQUEST["showroom_codigo16"];
$showroom_valor16=$_REQUEST["showroom_valor16"];
$showroom_nome17=$_REQUEST["showroom_nome17"];
$showroom_codigo17=$_REQUEST["showroom_codigo17"];
$showroom_valor17=$_REQUEST["showroom_valor17"];
$showroom_nome18=$_REQUEST["showroom_nome18"];
$showroom_codigo18=$_REQUEST["showroom_codigo18"];
$showroom_valor18=$_REQUEST["showroom_valor18"];
$showroom_nome19=$_REQUEST["showroom_nome19"];
$showroom_codigo19=$_REQUEST["showroom_codigo19"];
$showroom_valor19=$_REQUEST["showroom_valor19"];
$showroom_nome20=$_REQUEST["showroom_nome20"];
$showroom_codigo20=$_REQUEST["showroom_codigo20"];
$showroom_valor20=$_REQUEST["showroom_valor20"];


// Verificamos se a acao é igual a imagem
if ($id_showroom!=""){



  $sql = "UPDATE showroom SET SHOWROOM_NOME1='$showroom_nome1', SHOWROOM_CODIGO1='$showroom_codigo1', SHOWROOM_VALOR1='$showroom_valor1',SHOWROOM_NOME2='$showroom_nome2', SHOWROOM_CODIGO2='$showroom_codigo2', SHOWROOM_VALOR2='$showroom_valor2',SHOWROOM_NOME3='$showroom_nome3', SHOWROOM_CODIGO3='$showroom_codigo3', SHOWROOM_VALOR3='$showroom_valor3',SHOWROOM_NOME4='$showroom_nome4', SHOWROOM_CODIGO4='$showroom_codigo4', SHOWROOM_VALOR4='$showroom_valor4',SHOWROOM_NOME5='$showroom_nome5', SHOWROOM_CODIGO5='$showroom_codigo5', SHOWROOM_VALOR5='$showroom_valor5',SHOWROOM_NOME6='$showroom_nome6', SHOWROOM_CODIGO6='$showroom_codigo6', SHOWROOM_VALOR6='$showroom_valor6'
  ,SHOWROOM_NOME7='$showroom_nome7', SHOWROOM_CODIGO7='$showroom_codigo7', SHOWROOM_VALOR7='$showroom_valor7',SHOWROOM_NOME8='$showroom_nome8', SHOWROOM_CODIGO8='$showroom_codigo8', SHOWROOM_VALOR8='$showroom_valor8',SHOWROOM_NOME9='$showroom_nome9', SHOWROOM_CODIGO9='$showroom_codigo9', SHOWROOM_VALOR9='$showroom_valor9',SHOWROOM_NOME10='$showroom_nome10', SHOWROOM_CODIGO10='$showroom_codigo10', SHOWROOM_VALOR10='$showroom_valor10',SHOWROOM_NOME11='$showroom_nome11', SHOWROOM_CODIGO11='$showroom_codigo11', SHOWROOM_VALOR11='$showroom_valor11',SHOWROOM_NOME12='$showroom_nome12', SHOWROOM_CODIGO12='$showroom_codigo12', SHOWROOM_VALOR12='$showroom_valor12',SHOWROOM_NOME13='$showroom_nome13', SHOWROOM_CODIGO13='$showroom_codigo13', SHOWROOM_VALOR13='$showroom_valor13',SHOWROOM_NOME14='$showroom_nome14', SHOWROOM_CODIGO14='$showroom_codigo14', SHOWROOM_VALOR14='$showroom_valor14',SHOWROOM_NOME15='$showroom_nome15', SHOWROOM_CODIGO15='$showroom_codigo15', SHOWROOM_VALOR15='$showroom_valor15',SHOWROOM_NOME16='$showroom_nome16', SHOWROOM_CODIGO16='$showroom_codigo16', SHOWROOM_VALOR16='$showroom_valor16',SHOWROOM_NOME17='$showroom_nome17', SHOWROOM_CODIGO17='$showroom_codigo18', SHOWROOM_VALOR18='$showroom_valor18',SHOWROOM_NOME19='$showroom_nome19', SHOWROOM_CODIGO19='$showroom_codigo19', SHOWROOM_VALOR19='$showroom_valor19',SHOWROOM_NOME20='$showroom_nome20', SHOWROOM_CODIGO20='$showroom_codigo20', SHOWROOM_VALOR20='$showroom_valor20' WHERE ID_SHOWROOM='$id_showroom'";
   
}else{




   $sql = "INSERT INTO showroom (HOWROOM_NOME1,HOWROOM_CODIGO1,HOWROOM_VALOR1,HOWROOM_NOME2,HOWROOM_CODIGO2,HOWROOM_VALOR2,HOWROOM_NOME3,HOWROOM_CODIGO3,HOWROOM_VALOR3,HOWROOM_NOME4,HOWROOM_CODIGO4,HOWROOM_VALOR4,HOWROOM_NOME5,HOWROOM_CODIGO5,HOWROOM_VALOR5,HOWROOM_NOME6,HOWROOM_CODIGO6,HOWROOM_VALOR6,HOWROOM_NOME7,HOWROOM_CODIGO7,HOWROOM_VALOR7,HOWROOM_NOME8,HOWROOM_CODIGO8,HOWROOM_VALOR8,HOWROOM_NOME9,HOWROOM_CODIGO9,HOWROOM_VALOR9,HOWROOM_NOME10,HOWROOM_CODIGO10,HOWROOM_VALOR10,HOWROOM_NOME11,HOWROOM_CODIGO11,HOWROOM_VALOR11,HOWROOM_NOME12,HOWROOM_CODIGO12,HOWROOM_VALOR12,HOWROOM_NOME13,HOWROOM_CODIGO13,HOWROOM_VALOR13,HOWROOM_NOME14,HOWROOM_CODIGO14,HOWROOM_VALOR14,HOWROOM_NOME15,HOWROOM_CODIGO15,HOWROOM_VALOR15,HOWROOM_NOME16,HOWROOM_CODIGO16,HOWROOM_VALOR16,HOWROOM_NOME17,HOWROOM_CODIGO17,HOWROOM_VALOR17,HOWROOM_NOME18,HOWROOM_CODIGO18,HOWROOM_VALOR18,HOWROOM_NOME19,HOWROOM_CODIGO19,HOWROOM_VALOR19,HOWROOM_NOME20,HOWROOM_CODIGO20,HOWROOM_VALOR20) VALUES ('".$showroom_nome1."','".$showroom_codigo1."','".$showroom_valor1."','".$showroom_nome2."','".$showroom_codigo2."','".$showroom_valor2."','".$showroom_nome3."','".$showroom_codigo3."','".$showroom_valor3."','".$showroom_nome4."','".$showroom_codigo4."','".$showroom_valor4."','".$showroom_nome5."','".$showroom_codigo5."','".$showroom_valor5."','".$showroom_nome6."','".$showroom_codigo6."','".$showroom_valor6."','".$showroom_nome7."','".$showroom_codigo7."','".$showroom_valor7."','".$showroom_nome8."','".$showroom_codigo8."','".$showroom_valor8."','".$showroom_nome9."','".$showroom_codigo9."','".$showroom_valor9."','".$showroom_nome10."','".$showroom_codigo10."','".$showroom_valor10."','".$showroom_nome11."','".$showroom_codigo11."','".$showroom_valor11."','".$showroom_nome12."','".$showroom_codigo12."','".$showroom_valor12."','".$showroom_nome13."','".$showroom_codigo13."','".$showroom_valor13."','".$showroom_nome14."','".$showroom_codigo14."','".$showroom_valor14."','".$showroom_nome15."','".$showroom_codigo15."','".$showroom_valor15."','".$showroom_nome16."','".$showroom_codigo16."','".$showroom_valor16."','".$showroom_nome17."','".$showroom_codigo17."','".$showroom_valor17."','".$showroom_nome18."','".$showroom_codigo18."','".$showroom_valor18."','".$showroom_nome19."','".$showroom_codigo19."','".$showroom_valor19."','".$showroom_nome20."','".$showroom_codigo20."','".$showroom_valor20."')";

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
$nome_da_imagem = $handle->file_dst_name;

//echo $nome_da_imagem;
///echo"$foto1_produtos";
?> 
</body>

</html>
