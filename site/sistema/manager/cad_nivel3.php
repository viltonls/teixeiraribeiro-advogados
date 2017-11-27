<?php
$nunivel2 = $_POST["nivel2"];
$nmdescricao = $_POST["nomenivel3"];
$nmtitle = $_POST["desctitle"];
$operacao = $_POST["id"];
/*
 * operação que está sendo realizada
 * 1 - novo
 * 2 - alterar
 * 3 - excluir
 */
include_once("struct/auth.php");
include ("conexao_teste.php");
if ($operacao == 0)
{	
	$sql = "insert into portfolio (nunivel2,nmdescricao,nmtitle) values(";
	$sql .= $nunivel2.",'".$nmdescricao."','".$nmtitle."')";
}else{
	$sql = " update portfolio set"; 
	$sql .= " nunivel2 = ".$nunivel2;		
	$sql .= " ,nmdescricao = '".$nmdescricao."'";
	$sql .= " ,nmtitle = '".$nmtitle."'";
	$sql .= " where idportfolio = " . $operacao;	
}


mysql_query($sql) or die("Não foi possivel inserir os dados: ". $sql);
mysql_close();
echo "<script language=\"JavaScript\">";
echo "alert('Dados salvos com sucesso.','OK');";
echo "location.href=\"frmcad_nivel3.php\";";
echo "</script> ";
?>