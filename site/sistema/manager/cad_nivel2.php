<?php
$nunivel1 = $_POST["nivel1"];
$nmdescricao = $_POST["nomenivel2"];
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
		$sql = "insert into portfolio (nunivel1,nmdescricao) values(";
		$sql .= $nunivel1.",'".$nmdescricao."')";
}else{	
		$sql = " update portfolio set ";
		$sql .= " nmdescricao = '".$nmdescricao."'";		
		$sql .= " ,nunivel1 = " .$nunivel1;
		$sql .= " where idportfolio = " . $operacao;
}

mysql_query($sql) or die("Não foi possivel inserir os dados");
mysql_close();
echo "<script language=\"JavaScript\">";
echo "alert('Dados salvos com sucesso.','OK');";
echo "location.href=\"frmcad_nivel2.php\";";
echo "</script> ";
?>

