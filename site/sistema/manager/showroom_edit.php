<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_showroom="1";//$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM showroom WHERE ID_SHOWROOM='$id_showroom'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_showroom=$dados['id_showroom'];
$showroom_nome1=$dados['showroom_nome1'];
$showroom_codigo1=$dados['showroom_codigo1'];
$showroom_valor1=$dados['showroom_valor1'];
$showroom_nome2=$dados['showroom_nome2'];
$showroom_codigo2=$dados['showroom_codigo2'];
$showroom_valor2=$dados['showroom_valor2'];
$showroom_nome3=$dados['showroom_nome3'];
$showroom_codigo3=$dados['showroom_codigo3'];
$showroom_valor3=$dados['showroom_valor3'];
$showroom_nome4=$dados['showroom_nome4'];
$showroom_codigo4=$dados['showroom_codigo4'];
$showroom_valor4=$dados['showroom_valor4'];
$showroom_nome5=$dados['showroom_nome5'];
$showroom_codigo5=$dados['showroom_codigo5'];
$showroom_valor5=$dados['showroom_valor5'];
$showroom_nome6=$dados['showroom_nome6'];
$showroom_codigo6=$dados['showroom_codigo6'];
$showroom_valor6=$dados['showroom_valor6'];
$showroom_nome7=$dados['showroom_nome7'];
$showroom_codigo7=$dados['showroom_codigo7'];
$showroom_valor7=$dados['showroom_valor7'];
$showroom_nome8=$dados['showroom_nome8'];
$showroom_codigo8=$dados['showroom_codigo8'];
$showroom_valor8=$dados['showroom_valor8'];
$showroom_nome9=$dados['showroom_nome9'];
$showroom_codigo9=$dados['showroom_codigo9'];
$showroom_valor9=$dados['showroom_valor9'];
$showroom_nome10=$dados['showroom_nome10'];
$showroom_codigo10=$dados['showroom_codigo10'];
$showroom_valor10=$dados['showroom_valor10'];
$showroom_nome11=$dados['showroom_nome11'];
$showroom_codigo11=$dados['showroom_codigo11'];
$showroom_valor11=$dados['showroom_valor11'];
$showroom_nome12=$dados['showroom_nome12'];
$showroom_codigo12=$dados['showroom_codigo12'];
$showroom_valor12=$dados['showroom_valor12'];
$showroom_nome13=$dados['showroom_nome13'];
$showroom_codigo13=$dados['showroom_codigo13'];
$showroom_valor13=$dados['showroom_valor13'];
$showroom_nome14=$dados['showroom_nome14'];
$showroom_codigo14=$dados['showroom_codigo14'];
$showroom_valor14=$dados['showroom_valor14'];
$showroom_nome15=$dados['showroom_nome15'];
$showroom_codigo15=$dados['showroom_codigo15'];
$showroom_valor15=$dados['showroom_valor15'];
$showroom_nome16=$dados['showroom_nome16'];
$showroom_codigo16=$dados['showroom_codigo16'];
$showroom_valor16=$dados['showroom_valor16'];
$showroom_nome17=$dados['showroom_nome17'];
$showroom_codigo17=$dados['showroom_codigo17'];
$showroom_valor17=$dados['showroom_valor17'];
$showroom_nome18=$dados['showroom_nome18'];
$showroom_codigo18=$dados['showroom_codigo18'];
$showroom_valor18=$dados['showroom_valor18'];
$showroom_nome19=$dados['showroom_nome19'];
$showroom_codigo19=$dados['showroom_codigo19'];
$showroom_valor19=$dados['showroom_valor19'];
$showroom_nome14=$dados['showroom_nome20'];
$showroom_codigo14=$dados['showroom_codigo20'];
$showroom_valor14=$dados['showroom_valor20'];
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Show Room </div>

<div style="padding-top:8px;"></div>

<form action="showroom_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="10%" class="structFilter">Ve&iacute;culos</td>
			<td width="22%" class="structFilter">C&oacute;digo</td>
			<td width="68%" class="structFilter">Valor</td>
		</tr>
		<? if($showroom_nome1 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome1";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="id_showroom"  value="<?= $id_showroom?>" size="50" maxlength="200">
              <input type="hidden" class="structFilterBox" name="showroom_nome1"  value="<?= $showroom_nome1?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo1"  value="<?= $showroom_codigo1?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor1"  value="<?= $showroom_valor1?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome2 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome2";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome2"  value="<?= $showroom_nome2?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo2"  value="<?= $showroom_codigo2?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor2"  value="<?= $showroom_valor2?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome3 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome3";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome3"  value="<?= $showroom_nome3?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo3"  value="<?= $showroom_codigo3?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor3"  value="<?= $showroom_valor3?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">		</td>
		</tr>
		<? }?>
		<? if($showroom_nome4 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome4";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome4"  value="<?= $showroom_nome4?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo4"  value="<?= $showroom_codigo4?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor4"  value="<?= $showroom_valor4?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">		</td>
		</tr>
		<? }?>
		<? if($showroom_nome5 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome5";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome5"  value="<?= $showroom_nome5?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo5"  value="<?= $showroom_codigo5?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor5"  value="<?= $showroom_valor5?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome6 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome6";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome6"  value="<?= $showroom_nome6?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo6"  value="<?= $showroom_codigo6?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor6"  value="<?= $showroom_valor6?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome7 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome7";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome7"  value="<?= $showroom_nome7?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo7"  value="<?= $showroom_codigo7?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor7"  value="<?= $showroom_valor7?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome8 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome8";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome8"  value="<?= $showroom_nome8?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo8"  value="<?= $showroom_codigo8?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor8"  value="<?= $showroom_valor8?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome9 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome9";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome9"  value="<?= $showroom_nome9?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo9"  value="<?= $showroom_codigo9?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor9"  value="<?= $showroom_valor9?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome10 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome10";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome10"  value="<?= $showroom_nome10?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo10"  value="<?= $showroom_codigo10?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor10"  value="<?= $showroom_valor10?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome11 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome11";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome11"  value="<?= $showroom_nome11?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo11"  value="<?= $showroom_codigo11?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor11"  value="<?= $showroom_valor11?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome12 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome12";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome12"  value="<?= $showroom_nome12?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo12"  value="<?= $showroom_codigo12?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor12"  value="<?= $showroom_valor12?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome13 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome13";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome13"  value="<?= $showroom_nome13?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo13"  value="<?= $showroom_codigo13?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor13"  value="<?= $showroom_valor13?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">		</td>
		</tr>
		<? }?>
		<? if($showroom_nome14 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome14";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome14"  value="<?= $showroom_nome14?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo14"  value="<?= $showroom_codigo14?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor14"  value="<?= $showroom_valor14?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">		</td>
		</tr>
		<? }?>
		<? if($showroom_nome15 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome15";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome15"  value="<?= $showroom_nome15?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo15"  value="<?= $showroom_codigo15?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor15"  value="<?= $showroom_valor15?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome16 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome16";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome16"  value="<?= $showroom_nome16?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo16"  value="<?= $showroom_codigo16?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor16"  value="<?= $showroom_valor16?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome17 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome17";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome17"  value="<?= $showroom_nome17?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo17"  value="<?= $showroom_codigo17?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor17"  value="<?= $showroom_valor17?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome18 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome18";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome18"  value="<?= $showroom_nome18?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo18"  value="<?= $showroom_codigo18?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor18"  value="<?= $showroom_valor18?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">			</td>
		</tr>
		<? }?>
		<? if($showroom_nome19 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome19";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome19"  value="<?= $showroom_nome19?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo19"  value="<?= $showroom_codigo19?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor19"  value="<?= $showroom_valor19?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		<? if($showroom_nome20 !=""){?>
		<tr>
			<td width="10%" class="structFilter"><? echo"$showroom_nome20";?></td>
			<td width="22%" class="structFilter"><input type="hidden" class="structFilterBox" name="showroom_nome20"  value="<?= $showroom_nome20?>" size="50" maxlength="200">
            <input type="text" class="structFilterBox" name="showroom_codigo20"  value="<?= $showroom_codigo20?>" size="30" maxlength="200"></td>
			<td width="68%" class="structFilter"><input type="text" class="structFilterBox" name="showroom_valor20"  value="<?= $showroom_valor20?>" size="15" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		<? }?>
		
		
			<tr><td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			  <td class="structFilter">&nbsp;</td>
			  <td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>
<? /* } else { ?>
	Erro: não foi informada a organização.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>