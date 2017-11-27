<div style="width:3in;height:1.5in"><table cellpadding="0" cellspacing="0" border="0" width="200" style="width:3in;height:1.5in">
<tr>
	<td nowrap align="bottom"><div id="texto" style="font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
			<br>
			<span style="font-size:20pt"><b><?
				if ($inscricao->getCRACHA()) {
					echo strtoupper2($inscricao->getCRACHA());
				} else {
					$nomeArray = explode(" ",$inscricao->getNOME());
					echo strtoupper2($nomeArray[0]);
				}
			?></b></span><br>
			<span style="font-size:10pt;line-height:110%"><?= strtoupper2($inscricao->getNOME())?></span><br>
			<span style="font-size:10pt;line-height:110%"><b><?= substr(strtoupper2($inscricao->getORG_NOME()),0,20)?></b></span><br>
			<span style="font-size:10pt;line-height:110%"><? 
				if ($inscricao->getCIDADE()) echo strtoupper2($inscricao->getCIDADE());
				if ($inscricao->getESTADO()) echo " / ".substr(strtoupper2($inscricao->getESTADO()),0,12);
			?></span><br>
			<span style="font-size:10pt;line-height:110%"><? 
				if ($inscricao->getPAIS()) echo strtoupper2($inscricao->getPAIS());
			?></span><br>
			<span style="font-size:14pt;line-height:110%"><b><?
				if ($inscricao->getSTATUS_PGTO() == "o" || $inscricao->getSTATUS_PGTO() == "g") {
					if ($inscricao->getCURSO_1()) echo "C01 ";
					if ($inscricao->getCURSO_2()) echo "C02 ";
					if ($inscricao->getCURSO_3()) echo "C03 ";
					if ($inscricao->getCURSO_4()) echo "C04 ";
					if ($inscricao->getCURSO_5()) echo "C05 ";
					if ($inscricao->getCURSO_6()) echo "C06 ";
					if ($inscricao->getCURSO_7()) echo "C07 ";
					if ($inscricao->getCURSO_8()) echo "C08 ";
					if ($inscricao->getCURSO_9()) echo "C09 ";
					if ($inscricao->getCURSO_10()) echo "C10 ";
					if ($inscricao->getCURSO_11()) echo "C11 ";
					if ($inscricao->getCURSO_12()) echo "C12 ";
					if ($inscricao->getCURSO_13()) echo "C13 ";
					if ($inscricao->getCURSO_14()) echo "C14 ";
					if ($inscricao->getCURSO_15()) echo "C15 ";
					if ($inscricao->getCURSO_16()) echo "C16 ";
					if ($inscricao->getCURSO_17()) echo "C17 ";
					if ($inscricao->getCURSO_18()) echo "C18 ";
					if ($inscricao->getCURSO_19()) echo "C19 ";
					if ($inscricao->getCURSO_20()) echo "C20 ";
					if ($inscricao->getCURSO_21()) echo "C21 ";
					if ($inscricao->getCURSO_22()) echo "C22 ";
					if ($inscricao->getCURSO_23()) echo "C23 ";
					if ($inscricao->getCURSO_24()) echo "C24 ";
					if ($inscricao->getCURSO_25()) echo "C25 ";
					if ($inscricao->getCURSO_26()) echo "C26 ";
					if ($inscricao->getCURSO_27()) echo "C27 ";
					if ($inscricao->getCURSO_28()) echo "C28 ";
					if ($inscricao->getCURSO_29()) echo "C29 ";
					if ($inscricao->getCURSO_30()) echo "C30 ";
				}
			?></b></span>
<br></div></td>
</tr>
<tr>
	<td valign="middle"><div id="cracha<?=$inscricao->getID()?>" style="font-family:arial, helvetica; font-size:10pt; border: 0px solid gray;" align="center">
			<? $cod = str_pad($inscricao->getID(), 5, "0", STR_PAD_LEFT); ?>
			<img src="barcode_generator.php?cod=<?=$cod ?>" border="0">
			<script language="javascript">cracha<?=$inscricao->getID()?>.style.filter='progid:DXImageTransform.Microsoft.BasicImage(rotation=1)'</script>
	</div></td></tr>
</table></div>