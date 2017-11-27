<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<? 
$id=$_GET['id'];		
?>
<?php
include ("conexao_teste.php");

$desc = "";
$nivel1 = 0;
$nivel2 = 0;
if (isset($id)){
	$consulta = mysql_query("SELECT * FROM portfolio WHERE idportfolio = " . $id);
	echo $consulta;
	while ($dados = mysql_fetch_array($consulta))
	{
		$desc = $dados['nmdescricao'];
		$nivel1 = $dados['nunivel1'];				
	}
}else
	{
		$id=0;
	}
?>
<script language="JavaScript">
function trim(str) {	
	return str.replace(/^\s+|\s+$/g,"");	
	}
function validar()
{
	var f = document.cadastro;
	if (trim(f.nomenivel2.value) =="")
	{ 
		alert("Campo Descrição do Nível 2 obrigatório.");		
		f.nomenivel2.focus();		
		return false;		
	}
	return true;	
}

function voltar()
{
	location.href="frmloc_nivel2.php";	
}

function scrollWindowTop()
{
	window.scrollTo(0,0);
}
</script>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
		
<div class="structTitle">Editar Portf&oacute;lio de N2</div>
<div style="padding-top:8px;"></div>


<form name="cadastro" id="cadastro" method="post" action="cad_nivel2.php" onsubmit="return validar()"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
			<tr>
				<input name="id" type="hidden" id="id" value="<?php echo $id;?>"></input>
				<td width="19%" class="structFilter">Selecione n&iacute;vel 1:</td>
				<td width="81%" class="structFilter">			 
					<select id="nivel1" name="nivel1">
						<option value="1" <?php if ($nivel1 ==0 || $nivel1 ==1) {echo "selected=\"selected\"";} ?>>Circulação</option>
						<option value="2" <?php if ($nivel1 ==2) {echo "selected=\"selected\"";} ?>>CRM</option>
						<option value="3" <?php if ($nivel1 ==3) {echo "selected=\"selected\"";} ?>>Comercial</option>
						<option value="4" <?php if ($nivel1 ==4) {echo "selected=\"selected\"";} ?>>Financeiro</option>
						<option value="5" <?php if ($nivel1 ==5) {echo "selected=\"selected\"";} ?>>WEB</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="19%" class="structFilter">Descri&ccedil;&atilde;o do N&iacute;vel 2</td>
				<td width="81%" class="structFilter">
					<input type="edit" class="structFilterBox"  size="50" name="nomenivel2" value="<?php echo $desc; ?>"> </input>
				</td>
			</tr>
			<tr>
				<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
				<td class="structFilter">
					<input type="submit" class="structFilterButton" value="Salvar"></input> 
					<input type="button" class="structFilterButton" value="Cancelar" onclick="voltar()"></input>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
<? include_once("struct/struct_bottom.php")?>