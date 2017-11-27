<?
	header("Content-type: text/html; charset=ISO-8859-1");
	header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
	header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
	header( 'Cache-Control: no-store, no-cache, must-revalidate' );
	header( 'Cache-Control: post-check=0, pre-check=0', false );
	header( 'Pragma: no-cache' );
?>
<?include_once("struct/auth.php")?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title>Teixeira Ribeiro</title>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<link href="../library/struct_style.css" media="screen,print" type="text/css" rel="stylesheet"/>
</HEAD>
<BODY cellpadding="0" cellspacing="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargim="0" bgcolor="#303030">
<!--SCRIPT language=JavaScript src="struct/menu_array.js" type=text/javascript></SCRIPT-->
<SCRIPT language=JavaScript>
<?include_once("struct/menu_array.php")?>
</SCRIPT>

<SCRIPT language=JavaScript src="../library/mmenu.js" type=text/javascript></SCRIPT>
<SCRIPT language=JavaScript src="../library/struct_script.js" type=text/javascript></SCRIPT>
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" width="95%">
<tr><td background="../library/struct_top_back.gif" height="95">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td height="53" align="right" class="structInfo" style="padding-right:15px;padding-bottom:4px;" colspan="2" valign="bottom"><span class="structInfo" style="padding-right:15px;padding-bottom:4px;">
	  <?  /* @var $eventoAtual Evento */
			if ($eventoAtual && $eventoAtual->getID()) {
				$struct_nome_topo_array = explode(" ",trim($usuarioAtual->getNOME()));
				$struct_nome_topo = $struct_nome_topo_array[0];
				echo $struct_nome_topo_array[0].", você está navegando no sistema<br>";
				echo '<b>"'.$eventoAtual->getNOME().'"</b><br>';
				//echo '<a href="session_seleciona_evento.php?configurado=1&even_id='.$eventoAtual->getID().'&orga_id='.$eventoAtual->getORGA_ID().'" class="structInfo">Ver outro evento</a><br>';
			} else {
				/* @var $usuarioAtual Usuario */
				$struct_nome_topo_array = explode(" ",trim($usuarioAtual->getNOME()));
				$struct_nome_topo = $struct_nome_topo_array[0];
				echo "Olá, ".$struct_nome_topo."! <br>Seja bem-vindo ao sistema.";
			}
		?>
	</span></td>
</tr>
<tr>
	<td height="21" align="left" class="structMenu" style="padding-right:15px;padding-left:130" colspan="2">
	    <!--
		Captação &nbsp;&nbsp;|&nbsp;&nbsp;
		Operacional  &nbsp;&nbsp;|&nbsp;&nbsp;
		Inscrições  &nbsp;&nbsp;|&nbsp;&nbsp;
		Trabalhos  &nbsp;&nbsp;|&nbsp;&nbsp;
		Comercial  &nbsp;&nbsp;|&nbsp;&nbsp;
		Financeiro  &nbsp;&nbsp;|&nbsp;&nbsp;
		Relatórios  &nbsp;&nbsp;|&nbsp;&nbsp;
		Admin
		-->	</td>
</tr>
<tr>
	<td height="21" align="left" class="structNavigation" style="padding-left:15px;">
		<!--» Comercial » Listar Cotas-->	</td>
	<td height="21" align="right" class="structNavigation" style="padding-right:15px;">
		<a href="logout.php" class="structNavigation">Sair</a>	</td>
</tr>
</table>

</td></tr>
<tr><td bgcolor="white" style="padding:15px;" height="350px" valign="top">