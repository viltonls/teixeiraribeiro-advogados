<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Teixeira Ribeiro</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<link href="../library/struct_style.css" media="screen,print" type="text/css" rel="stylesheet"/>
<SCRIPT language=JavaScript src="../library/struct_script.js" type=text/javascript></SCRIPT>
</HEAD>
<BODY cellpadding="0" cellspacing="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargim="0" bgcolor="white">

<div align="center">
	<br><br><br><br><br><br><br><br><br>
	<div align="center" style="background:white; width: 260px; height:200px;padding-top:10px;">
	<form action="login_xp.php" method="POST" class="form.nospace">
	<input type="hidden" name="url" value="<?=$url?>">
	<table border="0" cellpadding="4" cellspacing="0" bgcolor="White">
	<tr>
		<td colspan="2" align="center"><img src="../library/logo.gif" vspace="20"></td>
	</tr>
	<tr>
		<td colspan="2" align="left" class="structFilter">
			Informe abaixo seus dados de acesso:
		</td>
	</tr>
	
	<tr>
		<td class="structFilter">Email:</td>
		<td class="structFilter"><input type="edit" class="structFilterBox" name="login" value="<?=$_REQUEST["login"]?>" size="40"></td>
	</tr>
	<tr>
		<td class="structFilter">Senha:</td>
		<td class="structFilter"><input type="password" class="structFilterBox" name="password" size="40"></td>
	</tr>
<? if ($_REQUEST["error"] == 1) { ?>	
	<tr>
		<td class="structFilter"></td>
		<td class="structFilter"><span style="color:red">Erro no login.</span></td>
	</tr>	
<? } ?>	
	<tr>
		<td class="structFilter"></td>
		<td class="structFilter"><input type="submit" class="structFilterButton" value="Entrar" style="width:70px;"></td>
	</tr>
	<tr>
		<td class="structFilter"></td>
		<td align="left" class="structFilter">
			<!--<br><a href="" class="main">Esqueci minha senha.</a>-->
		</td>
	</tr>
	</form>
	</table>
	</div>
</div>
</BODY>
</HTML>