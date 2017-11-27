<div style="width:1.5in;height:3in"><table cellpadding="0" cellspacing="0" border="0" width="200" style="width:1.5in;height:3in">
<tr>
	<td><div id="cracha<?=$inscricao->getID()?>" style="display: inline-block;font-family:arial, helvetica; font-size:10pt; border: 0px solid gray;" align="center">
			<? $cod = "A".str_pad($inscricao->getID(), 4, "0", STR_PAD_LEFT); ?>
			<img vspace="30" src="barcode_generator.php?cod=<?=$cod ?>" border="0">
			<script language="javascript">cracha<?=$inscricao->getID()?>.style.filter='progid:DXImageTransform.Microsoft.BasicImage(rotation=1)'</script>
			</div></td>
	<td nowrap align="bottom"><div id="texto" style="writing-mode: tb-rl;display: block;font-family:arial, helvetica; font-size:10pt; border: 0px solid gray" align="center">
			<br>
			<? $acomp = explode(" ",strtoupper(trim($inscricao->getACOMP())))?>
			<span style="font-size:20pt;line-height:110%"><b><?= substr($acomp[0],0,12)?></b></span><br>
			<span style="font-size:10pt;line-height:110%">ACOMPANHANTE DE</span><br>
			<span style="font-size:10pt;line-height:110%"><b><?= strtoupper($inscricao->getNOME())?></b></span><br>
			<span style="font-size:10pt;line-height:110%"><? 
				if ($inscricao->getCIDADE()) echo strtoupper($inscricao->getCIDADE());
				if ($inscricao->getESTADO()) echo " / ".strtoupper($inscricao->getESTADO());
			?></span><br>
			<span style="font-size:10pt;line-height:110%"><? 
				if ($inscricao->getPAIS()) echo strtoupper($inscricao->getPAIS());
			?></span></div></td>
</tr>
</table></div>