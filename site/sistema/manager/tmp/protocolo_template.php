<? include_once("../struct/auth.php")
/* @var $eventoConfiguracaoAtual Configuracao */

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE></TITLE>
</HEAD>
<BODY align="center" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<div align="center">
<br>
<style type="text/css">
td,div,body {font-family:arial, helvetica; font-size:8pt;}
.title {font-family:arial, helvetica; font-size:12pt; font-weight:bold;padding:2px;background-color:silver;}
.titleValue {font-family:arial, helvetica; font-size:12pt; font-weight:bold;padding:2px;}
.fieldName {font-family:arial, helvetica; font-size:8pt;padding:2px;}
.fieldValue {font-family:arial, helvetica; font-size:8pt;padding:2px;font-weight:bold;border: 1px solid black}
</style>

<div style="height:9cm; width:18cm; font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tr>
		<td colspan="3"><img src="../logos/<?=$eventoAtual->getID()?>.<?=$eventoConfiguracaoAtual->getLOGO_FORMATO()?>" vspace="5"></td>
	</tr>
	<tr>
		<td class="title" nowrap width="10%">RECIBO</td>
		<td class="titleValue" align="left">1234</td>
		<td class="titleValue" align="right">R$ 50,00</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>Recebemos de</td>
		<td class="fieldValue" colspan="2">CÁSSIO BOBSIN MACHADO</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>CNPJ/CPF</td>
		<td class="fieldValue" colspan="2">808.534.550-15</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>a quantia de</td>
		<td class="fieldValue" colspan="2">R$ 50,00</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>referente ao pgto de:</td>
		<td class="fieldValue" colspan="2">Congresso + Curso</td>
	</tr>
	<tr>
		<td></td>
		<td class="fieldName" align="right" colspan="2">Porto Alegre, 17 de novembro de 2006</td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<table cellpadding="0" cellspacing="3" border="0" width="100%">
			<tr>
				</td>
				<td class="fieldName" nowrap>
					<u>SECRETARIA EXECUTIVA</u><br>
					Rua 17 de Junho, 436<br>
					CEP 90110-170 - Porto Alegre - RS<br>
					Fone/Fax: 51 3226.3111 e 3211.3631<br>
					officemarketing@officemarketing.com.br<br>
				</td>
				<td class="fieldName" align="center">
					_____________________________________________________<br>
					<b>SERVIÇO NACIONAL DE APRENDIZAGEM INDUSTRIAL</b><br>
					CNPJ: 03.775.069/0001-85<br>
					AV. ASSIS BRASIL, 8450 - PORTO ALEGRE - RS<br>
					FONE: 051 3347.8400 - CEP 90140-000<br>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</div>

<!-- Script para imprimir na impressora padrão -->
<object id="WBControl" width="0" height="0" classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>
<script language="vbscript">WBControl.ExecWB 6,2,3</script>


</div>
</BODY>
</HTML>
