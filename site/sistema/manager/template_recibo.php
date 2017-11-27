<div style="height:8.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tr>
		<td colspan="2"><img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$eventoAtual->getID()?>_tmp.<?=$eventoConfiguracaoAtual->getLOGO_FORMATO()?>" vspace="5"></td>
		<td class="titleValue" align="right">1ª VIA</td>
	</tr>
	<tr>
		<td class="title" nowrap width="10%">RECIBO</td>
		<td class="titleValue" align="left"><?= $cod = str_pad($inscricao->getID(), 5, "0", STR_PAD_LEFT); ?></td>
		<td class="titleValue" align="right">R$ <?= number_format($inscricao->getVALOR()/100,2,",","."); ?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>Recebemos de</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getNOME();
		  else
		    echo $inscricao->getORG_NOME()." (Ref. ".$inscricao->getNOME().")";
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>CNPJ/CPF</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getCPF_PASSAPORTE();
		  else
		    echo $inscricao->getORG_CNPJ();
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>a quantia de</td>
		<td class="fieldValue" colspan="2"><?= valorPorExtenso($inscricao->getVALOR()/100);?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>referente ao pgto de:</td>
		<td class="fieldValue" colspan="2">
			<?
			switch ($inscricao->getTIPO()) {
				case "1": echo $eventoConfiguracaoXMLAtual->getOpcao1("PT"); break;
				case "2": echo $eventoConfiguracaoXMLAtual->getOpcao2("PT"); break;
				case "3": echo $eventoConfiguracaoXMLAtual->getOpcao3("PT"); break;
				case "4": echo $eventoConfiguracaoXMLAtual->getOpcao4("PT"); break;
				case "5": echo $eventoConfiguracaoXMLAtual->getOpcao5("PT"); break;
				case "6": echo $eventoConfiguracaoXMLAtual->getOpcao6("PT"); break;
				default: echo ""; break;
			}?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="fieldName" align="right" colspan="2">Porto Alegre, <?= dataPorExtenso(mktime(12, 0, 0, date("m"), date("d"), date("Y"))) ?></td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<table cellpadding="0" cellspacing="3" border="0" width="100%">
			<tr>
				</td>
				<td class="fieldName" nowrap>
					<u>SECRETARIA EXECUTIVA - Office Marketing</u><br>
					Rua 17 de Junho, 436<br>
					CEP 90110-170 - Porto Alegre - RS<br>
					Fone/Fax: 51 3226.3111 e 3211.3631<br>
					officemarketing@officemarketing.com.br<br>
				</td>
				<td class="fieldName" align="center">
					_____________________________________________________<br>
					<?= str_replace("\n","<br>",$eventoConfiguracaoAtual->getDADOS_RECIBO())?>
					</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</div>
<div style="height:1.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt;">
</div>
<div style="height:8.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tr>
		<td colspan="2"><img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$eventoAtual->getID()?>.<?=$eventoConfiguracaoAtual->getLOGO_FORMATO()?>" vspace="5"></td>
		<td class="titleValue" align="right">2ª VIA</td>
	</tr>
	<tr>
		<td class="title" nowrap width="10%">RECIBO</td>
		<td class="titleValue" align="left"><?= $cod = str_pad($inscricao->getID(), 5, "0", STR_PAD_LEFT); ?></td>
		<td class="titleValue" align="right">R$ <?= number_format($inscricao->getVALOR()/100,2,",","."); ?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>Recebemos de</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getNOME();
		  else
		    echo $inscricao->getORG_NOME()." (Ref. ".$inscricao->getNOME().")";
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>CNPJ/CPF</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getCPF_PASSAPORTE();
		  else
		    echo $inscricao->getORG_CNPJ();
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>a quantia de</td>
		<td class="fieldValue" colspan="2"><?= valorPorExtenso($inscricao->getVALOR()/100);?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>referente ao pgto de:</td>
		<td class="fieldValue" colspan="2">
			<?
			switch ($inscricao->getTIPO()) {
				case "1": echo $eventoConfiguracaoXMLAtual->getOpcao1("PT"); break;
				case "2": echo $eventoConfiguracaoXMLAtual->getOpcao2("PT"); break;
				case "3": echo $eventoConfiguracaoXMLAtual->getOpcao3("PT"); break;
				case "4": echo $eventoConfiguracaoXMLAtual->getOpcao4("PT"); break;
				case "5": echo $eventoConfiguracaoXMLAtual->getOpcao5("PT"); break;
				case "6": echo $eventoConfiguracaoXMLAtual->getOpcao6("PT"); break;
				default: echo ""; break;
			}?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="fieldName" align="right" colspan="2">Porto Alegre, <?= dataPorExtenso(mktime(12, 0, 0, date("m"), date("d"), date("Y"))) ?></td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<table cellpadding="0" cellspacing="3" border="0" width="100%">
			<tr>
				</td>
				<td class="fieldName" nowrap>
					<u>SECRETARIA EXECUTIVA - Office Marketing</u><br>
					Rua 17 de Junho, 436<br>
					CEP 90110-170 - Porto Alegre - RS<br>
					Fone/Fax: 51 3226.3111 e 3211.3631<br>
					officemarketing@officemarketing.com.br<br>
				</td>
				<td class="fieldName" align="center">
					_____________________________________________________<br>
					<?= str_replace("\n","<br>",$eventoConfiguracaoAtual->getDADOS_RECIBO())?>
					</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</div>
<div style="height:1.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt;">
</div>
<div style="height:8.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tr>
		<td colspan="2"><img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$eventoAtual->getID()?>.<?=$eventoConfiguracaoAtual->getLOGO_FORMATO()?>" vspace="5"></td>
		<td class="titleValue" align="right">3ª VIA</td>
	</tr>
	<tr>
		<td class="title" nowrap width="10%">RECIBO</td>
		<td class="titleValue" align="left"><?= $cod = str_pad($inscricao->getID(), 5, "0", STR_PAD_LEFT); ?></td>
		<td class="titleValue" align="right">R$ <?= number_format($inscricao->getVALOR()/100,2,",","."); ?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>Recebemos de</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getNOME();
		  else
		    echo $inscricao->getORG_NOME()." (Ref. ".$inscricao->getNOME().")";
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>CNPJ/CPF</td>
		<td class="fieldValue" colspan="2"><?
		  if ($tipo_recibo == "pf")
		  	echo $inscricao->getCPF_PASSAPORTE();
		  else
		    echo $inscricao->getORG_CNPJ();
		?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>a quantia de</td>
		<td class="fieldValue" colspan="2"><?= valorPorExtenso($inscricao->getVALOR()/100);?></td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>referente ao pgto de:</td>
		<td class="fieldValue" colspan="2">
			<?
			switch ($inscricao->getTIPO()) {
				case "1": echo $eventoConfiguracaoXMLAtual->getOpcao1("PT"); break;
				case "2": echo $eventoConfiguracaoXMLAtual->getOpcao2("PT"); break;
				case "3": echo $eventoConfiguracaoXMLAtual->getOpcao3("PT"); break;
				case "4": echo $eventoConfiguracaoXMLAtual->getOpcao4("PT"); break;
				case "5": echo $eventoConfiguracaoXMLAtual->getOpcao5("PT"); break;
				case "6": echo $eventoConfiguracaoXMLAtual->getOpcao6("PT"); break;
				default: echo ""; break;
			}?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="fieldName" align="right" colspan="2">Porto Alegre, <?= dataPorExtenso(mktime(12, 0, 0, date("m"), date("d"), date("Y"))) ?></td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<table cellpadding="0" cellspacing="3" border="0" width="100%">
			<tr>
				</td>
				<td class="fieldName" nowrap>
					<u>SECRETARIA EXECUTIVA - Office Marketing</u><br>
					Rua 17 de Junho, 436<br>
					CEP 90110-170 - Porto Alegre - RS<br>
					Fone/Fax: 51 3226.3111 e 3211.3631<br>
					officemarketing@officemarketing.com.br<br>
				</td>
				<td class="fieldName" align="center">
					_____________________________________________________<br>
					<?= str_replace("\n","<br>",$eventoConfiguracaoAtual->getDADOS_RECIBO())?>
					</td>
			</tr>
			</table>
		</td>
	</tr>
	</table></div>