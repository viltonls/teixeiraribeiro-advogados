<div style="height:8.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tr>
		<td colspan="2"><img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$eventoAtual->getID()?>_tmp.<?=$eventoConfiguracaoAtual->getLOGO_FORMATO()?>" vspace="5"></td>
		<td class="titleValue" align="right">Id: <?= $cod = "A".str_pad($inscricao->getID(), 4, "0", STR_PAD_LEFT);?></td>
	</tr>
	<tr>
		<td colspan="3" class="title" nowrap align="center"><br>PROTOCOLO DE ENTREGA DE MATERIAL / REGISTER OF RECEIVED MATERIAL</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap width="10%">Nome Completo</td>
		<td colspan="2" class="fieldValue"><?= $inscricao->getACOMP()?> (ACOMPANHANTE DE: <?= $inscricao->getNOME()?>)</td>
	</tr>
	<tr>
		<td class="fieldName" nowrap>Material</td>
		<td colspan="2" class="fieldName" colspan="2">
			<table cellpadding="2" cellspacing="0" border="0">
			<tr>
				<? if ($eventoConfiguracaoAtual->getPROT_PASTA()) { ?>
				<td><input type='checkbox' <? if ($checkPasta) echo "checked" ?> disabled></td>
				<td class="fieldName">Pasta / Bag &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
				<? } ?>
				<? if ($eventoConfiguracaoAtual->getPROT_CRACHA()) { ?>
				<td><input type='checkbox' <? if ($checkCracha) echo "checked" ?> disabled></td>
				<td class="fieldName">Crachá / Badge &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
				<? } ?>
				<? if ($eventoConfiguracaoAtual->getPROT_RECIBO()) { ?>
				<td><input type='checkbox' <? if ($checkRecibo) echo "checked" ?> disabled></td>
				<td class="fieldName">Recibo / Receipt &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
				<? } ?>
				<? if ($eventoConfiguracaoAtual->getPROT_CDROM()) { ?>
				<td><input type='checkbox' <? if ($checkCdrom) echo "checked" ?> disabled></td>
				<td class="fieldName">CD-ROM</td>
				<? } ?>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="fieldName" align="center">
			<br><br><br>
			_____________________________________________________<br>
			Assinatura / Signature
		</td>
	</tr>
	</table></div>