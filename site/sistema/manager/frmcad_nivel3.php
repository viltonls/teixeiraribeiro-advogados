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
	$title = "";
	$nivel1 = 0;
	$nivel2 = 0;
	if (isset($id)){
		$consulta = mysql_query("SELECT portfolio.idportfolio, portfolio.nmdescricao, portfolio.nunivel2, 
			nivel1.nunivel1,portfolio.nmtitle	 
			FROM portfolio 
			inner join portfolio nivel1 on (portfolio.nunivel2 = nivel1.idportfolio)
			WHERE portfolio.idportfolio = " . $id);
		while ($dados = mysql_fetch_array($consulta))
		{
			$desc = $dados['nmdescricao'];
			$title = $dados['nmtitle']; 
			$nivel1 = $dados['nunivel1'];
			$nivel2 = $dados['nunivel2'];
		}
	}else{
		$id=0;
	}
?>
<script type="text/javascript" src="../../js/jquery.1.3.js"></script>
<script language=JavaScript>	
	$(document).ready(function(){				
		$("#nivel1").change(function() {			
			$("#tabela").load("nivel2.php?id="+$("#nivel1").val()+"&id2=0");			
			console.log('click');					    
	  	});		
		$("#nivel1").show(function() {
		
			$("#tabela").load("nivel2.php?id="+$("#nivel1").val()+"&id2="+$("#id2").val());			    
	  	});	
	});
	function trim(str) {	
		return str.replace(/^\s+|\s+$/g,"");	
	}	
	function validar()
	{
	
		var f = document.cadastro;
		//	valida o select do nível 1, verificando se já foi selecionado	
		if (f.nivel1.value == 0)
		{ 
			alert("Campo do 'Nível 1' não foi selecionado.");		
			f.nivel1.focus();		
			return false;		
		}
	
		//valida o select do nivel 2, verificando se já foi selecionado algum item
		if (f.nivel2.value == 0)
		{ 
			alert("Campo do 'Nível 2' não foi selecionado.");		
			f.nivel2.focus();		
			return false;		
		}
	
		// valida o campo descritivo do nivel 3	
		if (trim(f.nomenivel3.value) =="")
		{ 
			alert("Campo Descrição do Nível 3 obrigatório.");		
			f.nomenivel3.focus();		
			return false;		
		}
		return true;	
	}

	function voltar()
	{
		location.href="frmloc_nivel3.php";	
	}

	function scrollWindowTop()
	{
		window.scrollTo(0,0);
	}
</script>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<div class="structTitle">Cadastro do N&iacute;vel 3</div>
<div style="padding-top:8px;"></div>
<form id="cadastro" name="cadastro" method="post" action="cad_nivel3.php" onsubmit="return validar();">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
			<tr>
				<input name="id" type="hidden" id="id" value="<?= $id;?>" />
				<input name="id2" type="hidden" id="id2" value="<?= $nivel2;?>" />
				<td width="19%" class="structFilter">Selecione n&iacute;vel 1:</td>
				<td width="81%" class="structFilter">						
					<select id="nivel1" name="nivel1"> 
						<option value="0" <? if ($nivel1 ==0) {echo "selected=\"selected\"";} ?>>Selecione...</option>
						<option value="1" <? if ($nivel1 ==1) {echo "selected=\"selected\"";} ?>>Circula&ccedil;&atilde;o</option>
						<option value="2" <? if ($nivel1 ==2) {echo "selected=\"selected\"";} ?>>CRM</option>
						<option value="3" <? if ($nivel1 ==3) {echo "selected=\"selected\"";} ?>>Comercial</option>
						<option value="4" <? if ($nivel1 ==4) {echo "selected=\"selected\"";} ?>>Financeiro</option>
						<option value="5" <? if ($nivel1 ==5) {echo "selected=\"selected\"";} ?>>WEB</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="19%" class="structFilter">Selecione n&iacute;vel 2:</td>
				<td width="81%" class="structFilter" id="tabela">
					<select id="nivel2" name="nivel2">
						<option value="0">Selecione o Nível 1</option>
					</select> 
				</td>
			</tr>			
			<tr>
				<td>Descri&ccedil;&atilde;o do N&iacute;vel 3:</td>
				<td>
					<input type="edit" class="structFilterBox" name="nomenivel3" size="40" value="<?php if (isset($desc)) echo $desc;?>"/>
				</td>
			</tr>
			<tr>	
				<td valign="top">Descritivo da ajuda:</td>
				<td>
					<textarea class="structFilterBox" name="desctitle" cols="41" rows="10"><?php if (isset($title)) echo $title;?></textarea>
				</td>
			</tr>
			<tr>
				<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
				<td class="structFilter">
					<input class="structFilterButton" type="submit" id="salvar" value="Salvar"></input> 
					<input class="structFilterButton" type="button" id="cancelar" value="Cancelar" onclick="voltar()"></input>		
				</td>
			</tr>
	</table>
	</td>
	</tr>
</table>
</form>
<? include_once("struct/struct_bottom.php")?>