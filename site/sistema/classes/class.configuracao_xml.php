<?php

class ConfiguracaoXML { // class : begin

// **********************
// ATTRIBUTE DECLARATION
// **********************

private $eventoAlias;
private $emailInscricao;
private $emailTrabalho;
private $inscricaoCategoriaA_PT;
private $inscricaoCategoriaB_PT;
private $inscricaoCategoriaC_PT;
private $inscricaoCategoriaD_PT;
private $inscricaoCategoriaE_PT;
private $inscricaoCategoriaF_PT;
private $inscricaoCategoriaG_PT;
private $inscricaoCategoriaH_PT;
private $inscricaoCategoriaI_PT;
private $inscricaoCategoriaJ_PT;
private $inscricaoCategoriaK_PT;
private $inscricaoCategoriaL_PT;
private $inscricaoCategoriaM_PT;
private $inscricaoCategoriaN_PT;
private $inscricaoCategoriaO_PT;
private $inscricaoCategoriaP_PT;
private $inscricaoCategoriaQ_PT;
private $inscricaoCategoriaR_PT;
private $inscricaoCategoriaS_PT;
private $inscricaoCategoriaT_PT;
private $inscricaoCategoriaU_PT;
private $inscricaoCategoriaV_PT;
private $inscricaoCategoriaW_PT;
private $inscricaoCategoriaX_PT;
private $inscricaoCategoriaY_PT;
private $inscricaoCategoriaZ_PT;
private $inscricaoCategoriaA_EN;
private $inscricaoCategoriaB_EN;
private $inscricaoCategoriaC_EN;
private $inscricaoCategoriaD_EN;
private $inscricaoCategoriaE_EN;
private $inscricaoCategoriaF_EN;
private $inscricaoCategoriaG_EN;
private $inscricaoCategoriaH_EN;
private $inscricaoCategoriaI_EN;
private $inscricaoCategoriaJ_EN;
private $inscricaoCategoriaK_EN;
private $inscricaoCategoriaL_EN;
private $inscricaoCategoriaM_EN;
private $inscricaoCategoriaN_EN;
private $inscricaoCategoriaO_EN;
private $inscricaoCategoriaP_EN;
private $inscricaoCategoriaQ_EN;
private $inscricaoCategoriaR_EN;
private $inscricaoCategoriaS_EN;
private $inscricaoCategoriaT_EN;
private $inscricaoCategoriaU_EN;
private $inscricaoCategoriaV_EN;
private $inscricaoCategoriaW_EN;
private $inscricaoCategoriaX_EN;
private $inscricaoCategoriaY_EN;
private $inscricaoCategoriaZ_EN;
private $inscricaoCategoriaA_ES;
private $inscricaoCategoriaB_ES;
private $inscricaoCategoriaC_ES;
private $inscricaoCategoriaD_ES;
private $inscricaoCategoriaE_ES;
private $inscricaoCategoriaF_ES;
private $inscricaoCategoriaG_ES;
private $inscricaoCategoriaH_ES;
private $inscricaoCategoriaI_ES;
private $inscricaoCategoriaJ_ES;
private $inscricaoCategoriaK_ES;
private $inscricaoCategoriaL_ES;
private $inscricaoCategoriaM_ES;
private $inscricaoCategoriaN_ES;
private $inscricaoCategoriaO_ES;
private $inscricaoCategoriaP_ES;
private $inscricaoCategoriaQ_ES;
private $inscricaoCategoriaR_ES;
private $inscricaoCategoriaS_ES;
private $inscricaoCategoriaT_ES;
private $inscricaoCategoriaU_ES;
private $inscricaoCategoriaV_ES;
private $inscricaoCategoriaW_ES;
private $inscricaoCategoriaX_ES;
private $inscricaoCategoriaY_ES;
private $inscricaoCategoriaZ_ES;
private $inscricaoOpcao1_PT;
private $inscricaoOpcao2_PT;
private $inscricaoOpcao3_PT;
private $inscricaoOpcao4_PT;
private $inscricaoOpcao5_PT;
private $inscricaoOpcao6_PT;
private $inscricaoOpcao1_EN;
private $inscricaoOpcao2_EN;
private $inscricaoOpcao3_EN;
private $inscricaoOpcao4_EN;
private $inscricaoOpcao5_EN;
private $inscricaoOpcao6_EN;
private $inscricaoOpcao1_ES;
private $inscricaoOpcao2_ES;
private $inscricaoOpcao3_ES;
private $inscricaoOpcao4_ES;
private $inscricaoOpcao5_ES;
private $inscricaoOpcao6_ES;
private $inscricaoTexto1_PT;
private $inscricaoTexto2_PT;
private $inscricaoTexto3_PT;
private $inscricaoTexto4_PT;
private $inscricaoTexto5_PT;
private $inscricaoTexto6_PT;
private $inscricaoTexto7_PT;
private $inscricaoTexto8_PT;
private $inscricaoTexto9_PT;
private $inscricaoTexto10_PT;
private $inscricaoTexto1_EN;
private $inscricaoTexto2_EN;
private $inscricaoTexto3_EN;
private $inscricaoTexto4_EN;
private $inscricaoTexto5_EN;
private $inscricaoTexto6_EN;
private $inscricaoTexto7_EN;
private $inscricaoTexto8_EN;
private $inscricaoTexto9_EN;
private $inscricaoTexto10_EN;
private $inscricaoTexto1_ES;
private $inscricaoTexto2_ES;
private $inscricaoTexto3_ES;
private $inscricaoTexto4_ES;
private $inscricaoTexto5_ES;
private $inscricaoTexto6_ES;
private $inscricaoTexto7_ES;
private $inscricaoTexto8_ES;
private $inscricaoTexto9_ES;
private $inscricaoTexto10_ES;
private $inscricaoBool1_PT;
private $inscricaoBool2_PT;
private $inscricaoBool3_PT;
private $inscricaoBool4_PT;
private $inscricaoBool5_PT;
private $inscricaoBool6_PT;
private $inscricaoBool7_PT;
private $inscricaoBool8_PT;
private $inscricaoBool9_PT;
private $inscricaoBool10_PT;
private $inscricaoBool11_PT;
private $inscricaoBool12_PT;
private $inscricaoBool13_PT;
private $inscricaoBool14_PT;
private $inscricaoBool15_PT;
private $inscricaoBool16_PT;
private $inscricaoBool17_PT;
private $inscricaoBool18_PT;
private $inscricaoBool19_PT;
private $inscricaoBool20_PT;
private $inscricaoBool1_EN;
private $inscricaoBool2_EN;
private $inscricaoBool3_EN;
private $inscricaoBool4_EN;
private $inscricaoBool5_EN;
private $inscricaoBool6_EN;
private $inscricaoBool7_EN;
private $inscricaoBool8_EN;
private $inscricaoBool9_EN;
private $inscricaoBool10_EN;
private $inscricaoBool11_EN;
private $inscricaoBool12_EN;
private $inscricaoBool13_EN;
private $inscricaoBool14_EN;
private $inscricaoBool15_EN;
private $inscricaoBool16_EN;
private $inscricaoBool17_EN;
private $inscricaoBool18_EN;
private $inscricaoBool19_EN;
private $inscricaoBool20_EN;
private $inscricaoBool1_ES;
private $inscricaoBool2_ES;
private $inscricaoBool3_ES;
private $inscricaoBool4_ES;
private $inscricaoBool5_ES;
private $inscricaoBool6_ES;
private $inscricaoBool7_ES;
private $inscricaoBool8_ES;
private $inscricaoBool9_ES;
private $inscricaoBool10_ES;
private $inscricaoBool11_ES;
private $inscricaoBool12_ES;
private $inscricaoBool13_ES;
private $inscricaoBool14_ES;
private $inscricaoBool15_ES;
private $inscricaoBool16_ES;
private $inscricaoBool17_ES;
private $inscricaoBool18_ES;
private $inscricaoBool19_ES;
private $inscricaoBool20_ES;
private $inscricaoCurso1_PT;
private $inscricaoCurso2_PT;
private $inscricaoCurso3_PT;
private $inscricaoCurso4_PT;
private $inscricaoCurso5_PT;
private $inscricaoCurso6_PT;
private $inscricaoCurso7_PT;
private $inscricaoCurso8_PT;
private $inscricaoCurso9_PT;
private $inscricaoCurso10_PT;
private $inscricaoCurso11_PT;
private $inscricaoCurso12_PT;
private $inscricaoCurso13_PT;
private $inscricaoCurso14_PT;
private $inscricaoCurso15_PT;
private $inscricaoCurso16_PT;
private $inscricaoCurso17_PT;
private $inscricaoCurso18_PT;
private $inscricaoCurso19_PT;
private $inscricaoCurso20_PT;
private $inscricaoCurso21_PT;
private $inscricaoCurso22_PT;
private $inscricaoCurso23_PT;
private $inscricaoCurso24_PT;
private $inscricaoCurso25_PT;
private $inscricaoCurso26_PT;
private $inscricaoCurso27_PT;
private $inscricaoCurso28_PT;
private $inscricaoCurso29_PT;
private $inscricaoCurso30_PT;
private $inscricaoCurso1_EN;
private $inscricaoCurso2_EN;
private $inscricaoCurso3_EN;
private $inscricaoCurso4_EN;
private $inscricaoCurso5_EN;
private $inscricaoCurso6_EN;
private $inscricaoCurso7_EN;
private $inscricaoCurso8_EN;
private $inscricaoCurso9_EN;
private $inscricaoCurso10_EN;
private $inscricaoCurso11_EN;
private $inscricaoCurso12_EN;
private $inscricaoCurso13_EN;
private $inscricaoCurso14_EN;
private $inscricaoCurso15_EN;
private $inscricaoCurso16_EN;
private $inscricaoCurso17_EN;
private $inscricaoCurso18_EN;
private $inscricaoCurso19_EN;
private $inscricaoCurso20_EN;
private $inscricaoCurso21_EN;
private $inscricaoCurso22_EN;
private $inscricaoCurso23_EN;
private $inscricaoCurso24_EN;
private $inscricaoCurso25_EN;
private $inscricaoCurso26_EN;
private $inscricaoCurso27_EN;
private $inscricaoCurso28_EN;
private $inscricaoCurso29_EN;
private $inscricaoCurso30_EN;
private $inscricaoCurso1_ES;
private $inscricaoCurso2_ES;
private $inscricaoCurso3_ES;
private $inscricaoCurso4_ES;
private $inscricaoCurso5_ES;
private $inscricaoCurso6_ES;
private $inscricaoCurso7_ES;
private $inscricaoCurso8_ES;
private $inscricaoCurso9_ES;
private $inscricaoCurso10_ES;
private $inscricaoCurso11_ES;
private $inscricaoCurso12_ES;
private $inscricaoCurso13_ES;
private $inscricaoCurso14_ES;
private $inscricaoCurso15_ES;
private $inscricaoCurso16_ES;
private $inscricaoCurso17_ES;
private $inscricaoCurso18_ES;
private $inscricaoCurso19_ES;
private $inscricaoCurso20_ES;
private $inscricaoCurso21_ES;
private $inscricaoCurso22_ES;
private $inscricaoCurso23_ES;
private $inscricaoCurso24_ES;
private $inscricaoCurso25_ES;
private $inscricaoCurso26_ES;
private $inscricaoCurso27_ES;
private $inscricaoCurso28_ES;
private $inscricaoCurso29_ES;
private $inscricaoCurso30_ES;
private $inscricaoCurso1Preco;
private $inscricaoCurso2Preco;
private $inscricaoCurso3Preco;
private $inscricaoCurso4Preco;
private $inscricaoCurso5Preco;
private $inscricaoCurso6Preco;
private $inscricaoCurso7Preco;
private $inscricaoCurso8Preco;
private $inscricaoCurso9Preco;
private $inscricaoCurso10Preco;
private $inscricaoCurso11Preco;
private $inscricaoCurso12Preco;
private $inscricaoCurso13Preco;
private $inscricaoCurso14Preco;
private $inscricaoCurso15Preco;
private $inscricaoCurso16Preco;
private $inscricaoCurso17Preco;
private $inscricaoCurso18Preco;
private $inscricaoCurso19Preco;
private $inscricaoCurso20Preco;
private $inscricaoCurso21Preco;
private $inscricaoCurso22Preco;
private $inscricaoCurso23Preco;
private $inscricaoCurso24Preco;
private $inscricaoCurso25Preco;
private $inscricaoCurso26Preco;
private $inscricaoCurso27Preco;
private $inscricaoCurso28Preco;
private $inscricaoCurso29Preco;
private $inscricaoCurso30Preco;
private $inscricaoDadosDepositoPT;
private $inscricaoDadosDepositoEN;
private $inscricaoDadosDepositoES;
private $inscricaoTelaSubmissaoPT;
private $inscricaoTelaSubmissaoEN;
private $inscricaoTelaSubmissaoES;
private $inscricaoTelaSubmissaoDepositoPT;
private $inscricaoTelaSubmissaoDepositoEN;
private $inscricaoTelaSubmissaoDepositoES;
private $inscricaoEmailSubmissaoPT;
private $inscricaoEmailSubmissaoEN;
private $inscricaoEmailSubmissaoES;
private $trabalhoAvaliacaoDescricaoPT;
private $trabalhoAvaliacaoDescricaoEN;
private $trabalhoAvaliacaoDescricaoES;
private $trabalhoAvaliacaoNotaADescricaoPT;
private $trabalhoAvaliacaoNotaADescricaoEN;
private $trabalhoAvaliacaoNotaADescricaoES;
private $trabalhoAvaliacaoNotaBDescricaoPT;
private $trabalhoAvaliacaoNotaBDescricaoEN;
private $trabalhoAvaliacaoNotaBDescricaoES;
private $trabalhoAvaliacaoNotaCDescricaoPT;
private $trabalhoAvaliacaoNotaCDescricaoEN;
private $trabalhoAvaliacaoNotaCDescricaoES;
private $trabalhoAvaliacaoNotaDDescricaoPT;
private $trabalhoAvaliacaoNotaDDescricaoEN;
private $trabalhoAvaliacaoNotaDDescricaoES;
private $trabalhoAvaliacaoNotaEDescricaoPT;
private $trabalhoAvaliacaoNotaEDescricaoEN;
private $trabalhoAvaliacaoNotaEDescricaoES;

private $trabalhoAvaliacaoNotaFDescricaoPT;
private $trabalhoAvaliacaoNotaFDescricaoEN;
private $trabalhoAvaliacaoNotaFDescricaoES;

private $trabalhoAvaliacaoNotaGDescricaoPT;
private $trabalhoAvaliacaoNotaGDescricaoEN;
private $trabalhoAvaliacaoNotaGDescricaoES;

private $trabalhoAvaliacaoNotaHDescricaoPT;
private $trabalhoAvaliacaoNotaHDescricaoEN;
private $trabalhoAvaliacaoNotaHDescricaoES;

private $trabalhoAvaliacaoNotaIDescricaoPT;
private $trabalhoAvaliacaoNotaIDescricaoEN;
private $trabalhoAvaliacaoNotaIDescricaoES;

private $trabalhoAvaliacaoNotaAMax;
private $trabalhoAvaliacaoNotaBMax;
private $trabalhoAvaliacaoNotaCMax;
private $trabalhoAvaliacaoNotaDMax;
private $trabalhoAvaliacaoNotaEMax;
private $trabalhoAvaliacaoNotaFMax;
private $trabalhoAvaliacaoNotaGMax;
private $trabalhoAvaliacaoNotaHMax;
private $trabalhoAvaliacaoNotaIMax;

private $TrabalhoArea1PT;
private $TrabalhoArea2PT;
private $TrabalhoArea3PT;
private $TrabalhoArea4PT;
private $TrabalhoArea5PT;
private $TrabalhoArea6PT;
private $TrabalhoArea7PT;
private $TrabalhoArea8PT;
private $TrabalhoArea9PT;
private $trabalhoArea10PT;
private $trabalhoArea11PT;
private $trabalhoArea12PT;
private $trabalhoArea13PT;
private $trabalhoArea14PT;
private $trabalhoArea15PT;
private $trabalhoArea16PT;
private $trabalhoArea17PT;
private $trabalhoArea18PT;
private $trabalhoArea19PT;
private $trabalhoArea20PT;
private $TrabalhoArea1EN;
private $TrabalhoArea2EN;
private $TrabalhoArea3EN;
private $TrabalhoArea4EN;
private $TrabalhoArea5EN;
private $TrabalhoArea6EN;
private $TrabalhoArea7EN;
private $TrabalhoArea8EN;
private $TrabalhoArea9EN;
private $trabalhoArea10EN;
private $trabalhoArea11EN;
private $trabalhoArea12EN;
private $trabalhoArea13EN;
private $trabalhoArea14EN;
private $trabalhoArea15EN;
private $trabalhoArea16EN;
private $trabalhoArea17EN;
private $trabalhoArea18EN;
private $trabalhoArea19EN;
private $trabalhoArea20EN;
private $TrabalhoArea1ES;
private $TrabalhoArea2ES;
private $TrabalhoArea3ES;
private $TrabalhoArea4ES;
private $TrabalhoArea5ES;
private $TrabalhoArea6ES;
private $TrabalhoArea7ES;
private $TrabalhoArea8ES;
private $TrabalhoArea9ES;
private $trabalhoArea10ES;
private $trabalhoArea11ES;
private $trabalhoArea12ES;
private $trabalhoArea13ES;
private $trabalhoArea14ES;
private $trabalhoArea15ES;
private $trabalhoArea16ES;
private $trabalhoArea17ES;
private $trabalhoArea18ES;
private $trabalhoArea19ES;
private $trabalhoArea20ES;
private $trabalhoEmailAvaliadorConvitePT;
private $trabalhoEmailAvaliadorConviteEN;
private $trabalhoEmailAvaliadorConviteES;
private $trabalhoEmailSubmissaoPT;
private $trabalhoEmailSubmissaoEN;
private $trabalhoEmailSubmissaoES;
private $trabalhoEmailAceitoPT;
private $trabalhoEmailAceitoEN;
private $trabalhoEmailAceitoES;
private $trabalhoEmailAceitoComRestricoesPT;
private $trabalhoEmailAceitoComRestricoesEN;
private $trabalhoEmailAceitoComRestricoesES;
private $trabalhoEmailRejeitadoPT;
private $trabalhoEmailRejeitadoEN;
private $trabalhoEmailRejeitadoES;
private $trabalhoTelaSubmissaoPT;
private $trabalhoTelaSubmissaoEN;
private $trabalhoTelaSubmissaoES;
private $trabalhoTelaSubmissaoOkPT;
private $trabalhoTelaSubmissaoOkEN;
private $trabalhoTelaSubmissaoOkES;


/**
 * Métodos GET
 */
function getEventoAlias() {
	return $this->eventoAlias;
}
function getEmailInscricao() {
	return $this->emailInscricao;
}
function getEmailTrabalho() {
	return $this->emailTrabalho;
}
function getInscricaoCategoriaA_PT() {
	return $this->inscricaoCategoriaA_PT;
}
function getInscricaoCategoriaB_PT() {
	return $this->inscricaoCategoriaB_PT;
}
function getInscricaoCategoriaC_PT() {
	return $this->inscricaoCategoriaC_PT;
}
function getInscricaoCategoriaD_PT() {
	return $this->inscricaoCategoriaD_PT;
}
function getInscricaoCategoriaE_PT() {
	return $this->inscricaoCategoriaE_PT;
}
function getInscricaoCategoriaF_PT() {
	return $this->inscricaoCategoriaF_PT;
}
function getInscricaoCategoriaG_PT() {
	return $this->inscricaoCategoriaG_PT;
}
function getInscricaoCategoriaH_PT() {
	return $this->inscricaoCategoriaH_PT;
}
function getInscricaoCategoriaI_PT() {
	return $this->inscricaoCategoriaI_PT;
}
function getInscricaoCategoriaJ_PT() {
	return $this->inscricaoCategoriaJ_PT;
}
function getInscricaoCategoriaK_PT() {
	return $this->inscricaoCategoriaK_PT;
}
function getInscricaoCategoriaL_PT() {
	return $this->inscricaoCategoriaL_PT;
}
function getInscricaoCategoriaM_PT() {
	return $this->inscricaoCategoriaM_PT;
}
function getInscricaoCategoriaN_PT() {
	return $this->inscricaoCategoriaN_PT;
}
function getInscricaoCategoriaO_PT() {
	return $this->inscricaoCategoriaO_PT;
}
function getInscricaoCategoriaP_PT() {
	return $this->inscricaoCategoriaP_PT;
}
function getInscricaoCategoriaQ_PT() {
	return $this->inscricaoCategoriaQ_PT;
}
function getInscricaoCategoriaR_PT() {
	return $this->inscricaoCategoriaR_PT;
}
function getInscricaoCategoriaS_PT() {
	return $this->inscricaoCategoriaS_PT;
}
function getInscricaoCategoriaT_PT() {
	return $this->inscricaoCategoriaT_PT;
}
function getInscricaoCategoriaU_PT() {
	return $this->inscricaoCategoriaU_PT;
}
function getInscricaoCategoriaV_PT() {
	return $this->inscricaoCategoriaV_PT;
}
function getInscricaoCategoriaW_PT() {
	return $this->inscricaoCategoriaW_PT;
}
function getInscricaoCategoriaX_PT() {
	return $this->inscricaoCategoriaX_PT;
}
function getInscricaoCategoriaY_PT() {
	return $this->inscricaoCategoriaY_PT;
}
function getInscricaoCategoriaZ_PT() {
	return $this->inscricaoCategoriaZ_PT;
}
function getInscricaoCategoriaA_EN() {
	return $this->inscricaoCategoriaA_EN;
}
function getInscricaoCategoriaB_EN() {
	return $this->inscricaoCategoriaB_EN;
}
function getInscricaoCategoriaC_EN() {
	return $this->inscricaoCategoriaC_EN;
}
function getInscricaoCategoriaD_EN() {
	return $this->inscricaoCategoriaD_EN;
}
function getInscricaoCategoriaE_EN() {
	return $this->inscricaoCategoriaE_EN;
}
function getInscricaoCategoriaF_EN() {
	return $this->inscricaoCategoriaF_EN;
}
function getInscricaoCategoriaG_EN() {
	return $this->inscricaoCategoriaG_EN;
}
function getInscricaoCategoriaH_EN() {
	return $this->inscricaoCategoriaH_EN;
}
function getInscricaoCategoriaI_EN() {
	return $this->inscricaoCategoriaI_EN;
}
function getInscricaoCategoriaJ_EN() {
	return $this->inscricaoCategoriaJ_EN;
}
function getInscricaoCategoriaK_EN() {
	return $this->inscricaoCategoriaK_EN;
}
function getInscricaoCategoriaL_EN() {
	return $this->inscricaoCategoriaL_EN;
}
function getInscricaoCategoriaM_EN() {
	return $this->inscricaoCategoriaM_EN;
}
function getInscricaoCategoriaN_EN() {
	return $this->inscricaoCategoriaN_EN;
}
function getInscricaoCategoriaO_EN() {
	return $this->inscricaoCategoriaO_EN;
}
function getInscricaoCategoriaP_EN() {
	return $this->inscricaoCategoriaP_EN;
}
function getInscricaoCategoriaQ_EN() {
	return $this->inscricaoCategoriaQ_EN;
}
function getInscricaoCategoriaR_EN() {
	return $this->inscricaoCategoriaR_EN;
}
function getInscricaoCategoriaS_EN() {
	return $this->inscricaoCategoriaS_EN;
}
function getInscricaoCategoriaT_EN() {
	return $this->inscricaoCategoriaT_EN;
}
function getInscricaoCategoriaU_EN() {
	return $this->inscricaoCategoriaU_EN;
}
function getInscricaoCategoriaV_EN() {
	return $this->inscricaoCategoriaV_EN;
}
function getInscricaoCategoriaW_EN() {
	return $this->inscricaoCategoriaW_EN;
}
function getInscricaoCategoriaX_EN() {
	return $this->inscricaoCategoriaX_EN;
}
function getInscricaoCategoriaY_EN() {
	return $this->inscricaoCategoriaY_EN;
}
function getInscricaoCategoriaZ_EN() {
	return $this->inscricaoCategoriaZ_EN;
}
function getInscricaoCategoriaA_ES() {
	return $this->inscricaoCategoriaA_ES;
}
function getInscricaoCategoriaB_ES() {
	return $this->inscricaoCategoriaB_ES;
}
function getInscricaoCategoriaC_ES() {
	return $this->inscricaoCategoriaC_ES;
}
function getInscricaoCategoriaD_ES() {
	return $this->inscricaoCategoriaD_ES;
}
function getInscricaoCategoriaE_ES() {
	return $this->inscricaoCategoriaE_ES;
}
function getInscricaoCategoriaF_ES() {
	return $this->inscricaoCategoriaF_ES;
}
function getInscricaoCategoriaG_ES() {
	return $this->inscricaoCategoriaG_ES;
}
function getInscricaoCategoriaH_ES() {
	return $this->inscricaoCategoriaH_ES;
}
function getInscricaoCategoriaI_ES() {
	return $this->inscricaoCategoriaI_ES;
}
function getInscricaoCategoriaJ_ES() {
	return $this->inscricaoCategoriaJ_ES;
}
function getInscricaoCategoriaK_ES() {
	return $this->inscricaoCategoriaK_ES;
}
function getInscricaoCategoriaL_ES() {
	return $this->inscricaoCategoriaL_ES;
}
function getInscricaoCategoriaM_ES() {
	return $this->inscricaoCategoriaM_ES;
}
function getInscricaoCategoriaN_ES() {
	return $this->inscricaoCategoriaN_ES;
}
function getInscricaoCategoriaO_ES() {
	return $this->inscricaoCategoriaO_ES;
}
function getInscricaoCategoriaP_ES() {
	return $this->inscricaoCategoriaP_ES;
}
function getInscricaoCategoriaQ_ES() {
	return $this->inscricaoCategoriaQ_ES;
}
function getInscricaoCategoriaR_ES() {
	return $this->inscricaoCategoriaR_ES;
}
function getInscricaoCategoriaS_ES() {
	return $this->inscricaoCategoriaS_ES;
}
function getInscricaoCategoriaT_ES() {
	return $this->inscricaoCategoriaT_ES;
}
function getInscricaoCategoriaU_ES() {
	return $this->inscricaoCategoriaU_ES;
}
function getInscricaoCategoriaV_ES() {
	return $this->inscricaoCategoriaV_ES;
}
function getInscricaoCategoriaW_ES() {
	return $this->inscricaoCategoriaW_ES;
}
function getInscricaoCategoriaX_ES() {
	return $this->inscricaoCategoriaX_ES;
}
function getInscricaoCategoriaY_ES() {
	return $this->inscricaoCategoriaY_ES;
}
function getInscricaoCategoriaZ_ES() {
	return $this->inscricaoCategoriaZ_ES;
}
function getInscricaoOpcao1_PT() {
	return $this->inscricaoOpcao1_PT;
}
function getInscricaoOpcao2_PT() {
	return $this->inscricaoOpcao2_PT;
}
function getInscricaoOpcao3_PT() {
	return $this->inscricaoOpcao3_PT;
}
function getInscricaoOpcao4_PT() {
	return $this->inscricaoOpcao4_PT;
}
function getInscricaoOpcao5_PT() {
	return $this->inscricaoOpcao5_PT;
}
function getInscricaoOpcao6_PT() {
	return $this->inscricaoOpcao6_PT;
}
function getInscricaoOpcao1_EN() {
	return $this->inscricaoOpcao1_EN;
}
function getInscricaoOpcao2_EN() {
	return $this->inscricaoOpcao2_EN;
}
function getInscricaoOpcao3_EN() {
	return $this->inscricaoOpcao3_EN;
}
function getInscricaoOpcao4_EN() {
	return $this->inscricaoOpcao4_EN;
}
function getInscricaoOpcao5_EN() {
	return $this->inscricaoOpcao5_EN;
}
function getInscricaoOpcao6_EN() {
	return $this->inscricaoOpcao6_EN;
}
function getInscricaoOpcao1_ES() {
	return $this->inscricaoOpcao1_ES;
}
function getInscricaoOpcao2_ES() {
	return $this->inscricaoOpcao2_ES;
}
function getInscricaoOpcao3_ES() {
	return $this->inscricaoOpcao3_ES;
}
function getInscricaoOpcao4_ES() {
	return $this->inscricaoOpcao4_ES;
}
function getInscricaoOpcao5_ES() {
	return $this->inscricaoOpcao5_ES;
}
function getInscricaoOpcao6_ES() {
	return $this->inscricaoOpcao6_ES;
}
function getInscricaoTexto1_PT() {
	return $this->inscricaoTexto1_PT;
}
function getInscricaoTexto2_PT() {
	return $this->inscricaoTexto2_PT;
}
function getInscricaoTexto3_PT() {
	return $this->inscricaoTexto3_PT;
}
function getInscricaoTexto4_PT() {
	return $this->inscricaoTexto4_PT;
}
function getInscricaoTexto5_PT() {
	return $this->inscricaoTexto5_PT;
}
function getInscricaoTexto6_PT() {
	return $this->inscricaoTexto6_PT;
}
function getInscricaoTexto7_PT() {
	return $this->inscricaoTexto7_PT;
}
function getInscricaoTexto8_PT() {
	return $this->inscricaoTexto8_PT;
}
function getInscricaoTexto9_PT() {
	return $this->inscricaoTexto9_PT;
}
function getInscricaoTexto10_PT() {
	return $this->inscricaoTexto10_PT;
}
function getInscricaoTexto1_EN() {
	return $this->inscricaoTexto1_EN;
}
function getInscricaoTexto2_EN() {
	return $this->inscricaoTexto2_EN;
}
function getInscricaoTexto3_EN() {
	return $this->inscricaoTexto3_EN;
}
function getInscricaoTexto4_EN() {
	return $this->inscricaoTexto4_EN;
}
function getInscricaoTexto5_EN() {
	return $this->inscricaoTexto5_EN;
}
function getInscricaoTexto6_EN() {
	return $this->inscricaoTexto6_EN;
}
function getInscricaoTexto7_EN() {
	return $this->inscricaoTexto7_EN;
}
function getInscricaoTexto8_EN() {
	return $this->inscricaoTexto8_EN;
}
function getInscricaoTexto9_EN() {
	return $this->inscricaoTexto9_EN;
}
function getInscricaoTexto10_EN() {
	return $this->inscricaoTexto10_EN;
}
function getInscricaoTexto1_ES() {
	return $this->inscricaoTexto1_ES;
}
function getInscricaoTexto2_ES() {
	return $this->inscricaoTexto2_ES;
}
function getInscricaoTexto3_ES() {
	return $this->inscricaoTexto3_ES;
}
function getInscricaoTexto4_ES() {
	return $this->inscricaoTexto4_ES;
}
function getInscricaoTexto5_ES() {
	return $this->inscricaoTexto5_ES;
}
function getInscricaoTexto6_ES() {
	return $this->inscricaoTexto6_ES;
}
function getInscricaoTexto7_ES() {
	return $this->inscricaoTexto7_ES;
}
function getInscricaoTexto8_ES() {
	return $this->inscricaoTexto8_ES;
}
function getInscricaoTexto9_ES() {
	return $this->inscricaoTexto9_ES;
}
function getInscricaoTexto10_ES() {
	return $this->inscricaoTexto10_ES;
}
function getInscricaoBool1_PT() {
	return $this->inscricaoBool1_PT;
}
function getInscricaoBool2_PT() {
	return $this->inscricaoBool2_PT;
}
function getInscricaoBool3_PT() {
	return $this->inscricaoBool3_PT;
}
function getInscricaoBool4_PT() {
	return $this->inscricaoBool4_PT;
}
function getInscricaoBool5_PT() {
	return $this->inscricaoBool5_PT;
}
function getInscricaoBool6_PT() {
	return $this->inscricaoBool6_PT;
}
function getInscricaoBool7_PT() {
	return $this->inscricaoBool7_PT;
}
function getInscricaoBool8_PT() {
	return $this->inscricaoBool8_PT;
}
function getInscricaoBool9_PT() {
	return $this->inscricaoBool9_PT;
}
function getInscricaoBool10_PT() {
	return $this->inscricaoBool10_PT;
}
function getInscricaoBool11_PT() {
	return $this->inscricaoBool11_PT;
}
function getInscricaoBool12_PT() {
	return $this->inscricaoBool12_PT;
}
function getInscricaoBool13_PT() {
	return $this->inscricaoBool13_PT;
}
function getInscricaoBool14_PT() {
	return $this->inscricaoBool14_PT;
}
function getInscricaoBool15_PT() {
	return $this->inscricaoBool15_PT;
}
function getInscricaoBool16_PT() {
	return $this->inscricaoBool16_PT;
}
function getInscricaoBool17_PT() {
	return $this->inscricaoBool17_PT;
}
function getInscricaoBool18_PT() {
	return $this->inscricaoBool18_PT;
}
function getInscricaoBool19_PT() {
	return $this->inscricaoBool19_PT;
}
function getInscricaoBool20_PT() {
	return $this->inscricaoBool20_PT;
}
function getInscricaoBool1_EN() {
	return $this->inscricaoBool1_EN;
}
function getInscricaoBool2_EN() {
	return $this->inscricaoBool2_EN;
}
function getInscricaoBool3_EN() {
	return $this->inscricaoBool3_EN;
}
function getInscricaoBool4_EN() {
	return $this->inscricaoBool4_EN;
}
function getInscricaoBool5_EN() {
	return $this->inscricaoBool5_EN;
}
function getInscricaoBool6_EN() {
	return $this->inscricaoBool6_EN;
}
function getInscricaoBool7_EN() {
	return $this->inscricaoBool7_EN;
}
function getInscricaoBool8_EN() {
	return $this->inscricaoBool8_EN;
}
function getInscricaoBool9_EN() {
	return $this->inscricaoBool9_EN;
}
function getInscricaoBool10_EN() {
	return $this->inscricaoBool10_EN;
}
function getInscricaoBool11_EN() {
	return $this->inscricaoBool11_EN;
}
function getInscricaoBool12_EN() {
	return $this->inscricaoBool12_EN;
}
function getInscricaoBool13_EN() {
	return $this->inscricaoBool13_EN;
}
function getInscricaoBool14_EN() {
	return $this->inscricaoBool14_EN;
}
function getInscricaoBool15_EN() {
	return $this->inscricaoBool15_EN;
}
function getInscricaoBool16_EN() {
	return $this->inscricaoBool16_EN;
}
function getInscricaoBool17_EN() {
	return $this->inscricaoBool17_EN;
}
function getInscricaoBool18_EN() {
	return $this->inscricaoBool18_EN;
}
function getInscricaoBool19_EN() {
	return $this->inscricaoBool19_EN;
}
function getInscricaoBool20_EN() {
	return $this->inscricaoBool20_EN;
}
function getInscricaoBool1_ES() {
	return $this->inscricaoBool1_ES;
}
function getInscricaoBool2_ES() {
	return $this->inscricaoBool2_ES;
}
function getInscricaoBool3_ES() {
	return $this->inscricaoBool3_ES;
}
function getInscricaoBool4_ES() {
	return $this->inscricaoBool4_ES;
}
function getInscricaoBool5_ES() {
	return $this->inscricaoBool5_ES;
}
function getInscricaoBool6_ES() {
	return $this->inscricaoBool6_ES;
}
function getInscricaoBool7_ES() {
	return $this->inscricaoBool7_ES;
}
function getInscricaoBool8_ES() {
	return $this->inscricaoBool8_ES;
}
function getInscricaoBool9_ES() {
	return $this->inscricaoBool9_ES;
}
function getInscricaoBool10_ES() {
	return $this->inscricaoBool10_ES;
}
function getInscricaoBool11_ES() {
	return $this->inscricaoBool11_ES;
}
function getInscricaoBool12_ES() {
	return $this->inscricaoBool12_ES;
}
function getInscricaoBool13_ES() {
	return $this->inscricaoBool13_ES;
}
function getInscricaoBool14_ES() {
	return $this->inscricaoBool14_ES;
}
function getInscricaoBool15_ES() {
	return $this->inscricaoBool15_ES;
}
function getInscricaoBool16_ES() {
	return $this->inscricaoBool16_ES;
}
function getInscricaoBool17_ES() {
	return $this->inscricaoBool17_ES;
}
function getInscricaoBool18_ES() {
	return $this->inscricaoBool18_ES;
}
function getInscricaoBool19_ES() {
	return $this->inscricaoBool19_ES;
}
function getInscricaoBool20_ES() {
	return $this->inscricaoBool20_ES;
}
function getInscricaoCurso1_PT() {
	return $this->inscricaoCurso1_PT;
}
function getInscricaoCurso2_PT() {
	return $this->inscricaoCurso2_PT;
}
function getInscricaoCurso3_PT() {
	return $this->inscricaoCurso3_PT;
}
function getInscricaoCurso4_PT() {
	return $this->inscricaoCurso4_PT;
}
function getInscricaoCurso5_PT() {
	return $this->inscricaoCurso5_PT;
}
function getInscricaoCurso6_PT() {
	return $this->inscricaoCurso6_PT;
}
function getInscricaoCurso7_PT() {
	return $this->inscricaoCurso7_PT;
}
function getInscricaoCurso8_PT() {
	return $this->inscricaoCurso8_PT;
}
function getInscricaoCurso9_PT() {
	return $this->inscricaoCurso9_PT;
}
function getInscricaoCurso10_PT() {
	return $this->inscricaoCurso10_PT;
}
function getInscricaoCurso11_PT() {
	return $this->inscricaoCurso11_PT;
}
function getInscricaoCurso12_PT() {
	return $this->inscricaoCurso12_PT;
}
function getInscricaoCurso13_PT() {
	return $this->inscricaoCurso13_PT;
}
function getInscricaoCurso14_PT() {
	return $this->inscricaoCurso14_PT;
}
function getInscricaoCurso15_PT() {
	return $this->inscricaoCurso15_PT;
}
function getInscricaoCurso16_PT() {
	return $this->inscricaoCurso16_PT;
}
function getInscricaoCurso17_PT() {
	return $this->inscricaoCurso17_PT;
}
function getInscricaoCurso18_PT() {
	return $this->inscricaoCurso18_PT;
}
function getInscricaoCurso19_PT() {
	return $this->inscricaoCurso19_PT;
}
function getInscricaoCurso20_PT() {
	return $this->inscricaoCurso20_PT;
}
function getInscricaoCurso21_PT() {
	return $this->inscricaoCurso21_PT;
}
function getInscricaoCurso22_PT() {
	return $this->inscricaoCurso22_PT;
}
function getInscricaoCurso23_PT() {
	return $this->inscricaoCurso23_PT;
}
function getInscricaoCurso24_PT() {
	return $this->inscricaoCurso24_PT;
}
function getInscricaoCurso25_PT() {
	return $this->inscricaoCurso25_PT;
}
function getInscricaoCurso26_PT() {
	return $this->inscricaoCurso26_PT;
}
function getInscricaoCurso27_PT() {
	return $this->inscricaoCurso27_PT;
}
function getInscricaoCurso28_PT() {
	return $this->inscricaoCurso28_PT;
}
function getInscricaoCurso29_PT() {
	return $this->inscricaoCurso29_PT;
}
function getInscricaoCurso30_PT() {
	return $this->inscricaoCurso30_PT;
}
function getInscricaoCurso1_EN() {
	return $this->inscricaoCurso1_EN;
}
function getInscricaoCurso2_EN() {
	return $this->inscricaoCurso2_EN;
}
function getInscricaoCurso3_EN() {
	return $this->inscricaoCurso3_EN;
}
function getInscricaoCurso4_EN() {
	return $this->inscricaoCurso4_EN;
}
function getInscricaoCurso5_EN() {
	return $this->inscricaoCurso5_EN;
}
function getInscricaoCurso6_EN() {
	return $this->inscricaoCurso6_EN;
}
function getInscricaoCurso7_EN() {
	return $this->inscricaoCurso7_EN;
}
function getInscricaoCurso8_EN() {
	return $this->inscricaoCurso8_EN;
}
function getInscricaoCurso9_EN() {
	return $this->inscricaoCurso9_EN;
}
function getInscricaoCurso10_EN() {
	return $this->inscricaoCurso10_EN;
}
function getInscricaoCurso11_EN() {
	return $this->inscricaoCurso11_EN;
}
function getInscricaoCurso12_EN() {
	return $this->inscricaoCurso12_EN;
}
function getInscricaoCurso13_EN() {
	return $this->inscricaoCurso13_EN;
}
function getInscricaoCurso14_EN() {
	return $this->inscricaoCurso14_EN;
}
function getInscricaoCurso15_EN() {
	return $this->inscricaoCurso15_EN;
}
function getInscricaoCurso16_EN() {
	return $this->inscricaoCurso16_EN;
}
function getInscricaoCurso17_EN() {
	return $this->inscricaoCurso17_EN;
}
function getInscricaoCurso18_EN() {
	return $this->inscricaoCurso18_EN;
}
function getInscricaoCurso19_EN() {
	return $this->inscricaoCurso19_EN;
}
function getInscricaoCurso20_EN() {
	return $this->inscricaoCurso20_EN;
}
function getInscricaoCurso21_EN() {
	return $this->inscricaoCurso21_EN;
}
function getInscricaoCurso22_EN() {
	return $this->inscricaoCurso22_EN;
}
function getInscricaoCurso23_EN() {
	return $this->inscricaoCurso23_EN;
}
function getInscricaoCurso24_EN() {
	return $this->inscricaoCurso24_EN;
}
function getInscricaoCurso25_EN() {
	return $this->inscricaoCurso25_EN;
}
function getInscricaoCurso26_EN() {
	return $this->inscricaoCurso26_EN;
}
function getInscricaoCurso27_EN() {
	return $this->inscricaoCurso27_EN;
}
function getInscricaoCurso28_EN() {
	return $this->inscricaoCurso28_EN;
}
function getInscricaoCurso29_EN() {
	return $this->inscricaoCurso29_EN;
}
function getInscricaoCurso30_EN() {
	return $this->inscricaoCurso30_EN;
}
function getInscricaoCurso1_ES() {
	return $this->inscricaoCurso1_ES;
}
function getInscricaoCurso2_ES() {
	return $this->inscricaoCurso2_ES;
}
function getInscricaoCurso3_ES() {
	return $this->inscricaoCurso3_ES;
}
function getInscricaoCurso4_ES() {
	return $this->inscricaoCurso4_ES;
}
function getInscricaoCurso5_ES() {
	return $this->inscricaoCurso5_ES;
}
function getInscricaoCurso6_ES() {
	return $this->inscricaoCurso6_ES;
}
function getInscricaoCurso7_ES() {
	return $this->inscricaoCurso7_ES;
}
function getInscricaoCurso8_ES() {
	return $this->inscricaoCurso8_ES;
}
function getInscricaoCurso9_ES() {
	return $this->inscricaoCurso9_ES;
}
function getInscricaoCurso10_ES() {
	return $this->inscricaoCurso10_ES;
}
function getInscricaoCurso11_ES() {
	return $this->inscricaoCurso11_ES;
}
function getInscricaoCurso12_ES() {
	return $this->inscricaoCurso12_ES;
}
function getInscricaoCurso13_ES() {
	return $this->inscricaoCurso13_ES;
}
function getInscricaoCurso14_ES() {
	return $this->inscricaoCurso14_ES;
}
function getInscricaoCurso15_ES() {
	return $this->inscricaoCurso15_ES;
}
function getInscricaoCurso16_ES() {
	return $this->inscricaoCurso16_ES;
}
function getInscricaoCurso17_ES() {
	return $this->inscricaoCurso17_ES;
}
function getInscricaoCurso18_ES() {
	return $this->inscricaoCurso18_ES;
}
function getInscricaoCurso19_ES() {
	return $this->inscricaoCurso19_ES;
}
function getInscricaoCurso20_ES() {
	return $this->inscricaoCurso20_ES;
}
function getInscricaoCurso21_ES() {
	return $this->inscricaoCurso21_ES;
}
function getInscricaoCurso22_ES() {
	return $this->inscricaoCurso22_ES;
}
function getInscricaoCurso23_ES() {
	return $this->inscricaoCurso23_ES;
}
function getInscricaoCurso24_ES() {
	return $this->inscricaoCurso24_ES;
}
function getInscricaoCurso25_ES() {
	return $this->inscricaoCurso25_ES;
}
function getInscricaoCurso26_ES() {
	return $this->inscricaoCurso26_ES;
}
function getInscricaoCurso27_ES() {
	return $this->inscricaoCurso27_ES;
}
function getInscricaoCurso28_ES() {
	return $this->inscricaoCurso28_ES;
}
function getInscricaoCurso29_ES() {
	return $this->inscricaoCurso29_ES;
}
function getInscricaoCurso30_ES() {
	return $this->inscricaoCurso30_ES;
}
function getInscricaoCurso1Preco() {
	return $this->inscricaoCurso1Preco;
}
function getInscricaoCurso2Preco() {
	return $this->inscricaoCurso2Preco;
}
function getInscricaoCurso3Preco() {
	return $this->inscricaoCurso3Preco;
}
function getInscricaoCurso4Preco() {
	return $this->inscricaoCurso4Preco;
}
function getInscricaoCurso5Preco() {
	return $this->inscricaoCurso5Preco;
}
function getInscricaoCurso6Preco() {
	return $this->inscricaoCurso6Preco;
}
function getInscricaoCurso7Preco() {
	return $this->inscricaoCurso7Preco;
}
function getInscricaoCurso8Preco() {
	return $this->inscricaoCurso8Preco;
}
function getInscricaoCurso9Preco() {
	return $this->inscricaoCurso9Preco;
}
function getInscricaoCurso10Preco() {
	return $this->inscricaoCurso10Preco;
}
function getInscricaoCurso11Preco() {
	return $this->inscricaoCurso11Preco;
}
function getInscricaoCurso12Preco() {
	return $this->inscricaoCurso12Preco;
}
function getInscricaoCurso13Preco() {
	return $this->inscricaoCurso13Preco;
}
function getInscricaoCurso14Preco() {
	return $this->inscricaoCurso14Preco;
}
function getInscricaoCurso15Preco() {
	return $this->inscricaoCurso15Preco;
}
function getInscricaoCurso16Preco() {
	return $this->inscricaoCurso16Preco;
}
function getInscricaoCurso17Preco() {
	return $this->inscricaoCurso17Preco;
}
function getInscricaoCurso18Preco() {
	return $this->inscricaoCurso18Preco;
}
function getInscricaoCurso19Preco() {
	return $this->inscricaoCurso19Preco;
}
function getInscricaoCurso20Preco() {
	return $this->inscricaoCurso20Preco;
}
function getInscricaoCurso21Preco() {
	return $this->inscricaoCurso21Preco;
}
function getInscricaoCurso22Preco() {
	return $this->inscricaoCurso22Preco;
}
function getInscricaoCurso23Preco() {
	return $this->inscricaoCurso23Preco;
}
function getInscricaoCurso24Preco() {
	return $this->inscricaoCurso24Preco;
}
function getInscricaoCurso25Preco() {
	return $this->inscricaoCurso25Preco;
}
function getInscricaoCurso26Preco() {
	return $this->inscricaoCurso26Preco;
}
function getInscricaoCurso27Preco() {
	return $this->inscricaoCurso27Preco;
}
function getInscricaoCurso28Preco() {
	return $this->inscricaoCurso28Preco;
}
function getInscricaoCurso29Preco() {
	return $this->inscricaoCurso29Preco;
}
function getInscricaoCurso30Preco() {
	return $this->inscricaoCurso30Preco;
}
function getInscricaoDadosDepositoPT() {
	return $this->inscricaoDadosDepositoPT;
}
function getInscricaoDadosDepositoEN() {
	return $this->inscricaoDadosDepositoEN;
}
function getInscricaoDadosDepositoES() {
	return $this->inscricaoDadosDepositoES;
}
function getInscricaoTelaSubmissaoPT() {
	return $this->inscricaoTelaSubmissaoPT;
}
function getInscricaoTelaSubmissaoEN() {
	return $this->inscricaoTelaSubmissaoEN;
}
function getInscricaoTelaSubmissaoES() {
	return $this->inscricaoTelaSubmissaoES;
}
function getInscricaoTelaSubmissaoDepositoPT() {
	return $this->inscricaoTelaSubmissaoDepositoPT;
}
function getInscricaoTelaSubmissaoDepositoEN() {
	return $this->inscricaoTelaSubmissaoDepositoEN;
}
function getInscricaoTelaSubmissaoDepositoES() {
	return $this->inscricaoTelaSubmissaoDepositoES;
}
function getInscricaoEmailSubmissaoPT() {
	return $this->inscricaoEmailSubmissaoPT;
}
function getInscricaoEmailSubmissaoEN() {
	return $this->inscricaoEmailSubmissaoEN;
}
function getInscricaoEmailSubmissaoES() {
	return $this->inscricaoEmailSubmissaoES;
}
function getTrabalhoAvaliacaoDescricaoPT() {
	return $this->trabalhoAvaliacaoDescricaoPT;
}
function getTrabalhoAvaliacaoDescricaoEN() {
	return $this->trabalhoAvaliacaoDescricaoEN;
}
function getTrabalhoAvaliacaoDescricaoES() {
	return $this->trabalhoAvaliacaoDescricaoES;
}
function getTrabalhoAvaliacaoNotaADescricaoPT() {
	return $this->trabalhoAvaliacaoNotaADescricaoPT;
}
function getTrabalhoAvaliacaoNotaADescricaoEN() {
	return $this->trabalhoAvaliacaoNotaADescricaoEN;
}
function getTrabalhoAvaliacaoNotaADescricaoES() {
	return $this->trabalhoAvaliacaoNotaADescricaoES;
}
function getTrabalhoAvaliacaoNotaBDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaBDescricaoPT;
}
function getTrabalhoAvaliacaoNotaBDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaBDescricaoEN;
}
function getTrabalhoAvaliacaoNotaBDescricaoES() {
	return $this->trabalhoAvaliacaoNotaBDescricaoES;
}
function getTrabalhoAvaliacaoNotaCDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaCDescricaoPT;
}
function getTrabalhoAvaliacaoNotaCDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaCDescricaoEN;
}
function getTrabalhoAvaliacaoNotaCDescricaoES() {
	return $this->trabalhoAvaliacaoNotaCDescricaoES;
}
function getTrabalhoAvaliacaoNotaDDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaDDescricaoPT;
}
function getTrabalhoAvaliacaoNotaDDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaDDescricaoEN;
}
function getTrabalhoAvaliacaoNotaDDescricaoES() {
	return $this->trabalhoAvaliacaoNotaDDescricaoES;
}
function getTrabalhoAvaliacaoNotaEDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaEDescricaoPT;
}
function getTrabalhoAvaliacaoNotaEDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaEDescricaoEN;
}
function getTrabalhoAvaliacaoNotaEDescricaoES() {
	return $this->trabalhoAvaliacaoNotaEDescricaoES;
}

function getTrabalhoAvaliacaoNotaFDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaFDescricaoPT;
}
function getTrabalhoAvaliacaoNotaFDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaFDescricaoEN;
}
function getTrabalhoAvaliacaoNotaFDescricaoES() {
	return $this->trabalhoAvaliacaoNotaFDescricaoES;
}

function getTrabalhoAvaliacaoNotaGDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaGDescricaoPT;
}
function getTrabalhoAvaliacaoNotaGDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaGDescricaoEN;
}
function getTrabalhoAvaliacaoNotaGDescricaoES() {
	return $this->trabalhoAvaliacaoNotaGDescricaoES;
}

function getTrabalhoAvaliacaoNotaHDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaHDescricaoPT;
}
function getTrabalhoAvaliacaoNotaHDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaHDescricaoEN;
}
function getTrabalhoAvaliacaoNotaHDescricaoES() {
	return $this->trabalhoAvaliacaoNotaHDescricaoES;
}

function getTrabalhoAvaliacaoNotaIDescricaoPT() {
	return $this->trabalhoAvaliacaoNotaIDescricaoPT;
}
function getTrabalhoAvaliacaoNotaIDescricaoEN() {
	return $this->trabalhoAvaliacaoNotaIDescricaoEN;
}
function getTrabalhoAvaliacaoNotaIDescricaoES() {
	return $this->trabalhoAvaliacaoNotaIDescricaoES;
}

function getTrabalhoAvaliacaoNotaAMax() {
	return $this->trabalhoAvaliacaoNotaAMax;
}
function getTrabalhoAvaliacaoNotaBMax() {
	return $this->trabalhoAvaliacaoNotaBMax;
}
function getTrabalhoAvaliacaoNotaCMax() {
	return $this->trabalhoAvaliacaoNotaCMax;
}
function getTrabalhoAvaliacaoNotaDMax() {
	return $this->trabalhoAvaliacaoNotaDMax;
}
function getTrabalhoAvaliacaoNotaEMax() {
	return $this->trabalhoAvaliacaoNotaEMax;
}

function getTrabalhoAvaliacaoNotaFMax() {
	return $this->trabalhoAvaliacaoNotaFMax;
}
function getTrabalhoAvaliacaoNotaGMax() {
	return $this->trabalhoAvaliacaoNotaGMax;
}
function getTrabalhoAvaliacaoNotaHMax() {
	return $this->trabalhoAvaliacaoNotaHMax;
}
function getTrabalhoAvaliacaoNotaIMax() {
	return $this->trabalhoAvaliacaoNotaIMax;
}

function getTrabalhoArea1PT() {
	return $this->trabalhoArea1PT;
}
function getTrabalhoArea2PT() {
	return $this->trabalhoArea2PT;
}
function getTrabalhoArea3PT() {
	return $this->trabalhoArea3PT;
}
function getTrabalhoArea4PT() {
	return $this->trabalhoArea4PT;
}
function getTrabalhoArea5PT() {
	return $this->trabalhoArea5PT;
}
function getTrabalhoArea6PT() {
	return $this->trabalhoArea6PT;
}
function getTrabalhoArea7PT() {
	return $this->trabalhoArea7PT;
}
function getTrabalhoArea8PT() {
	return $this->trabalhoArea8PT;
}
function getTrabalhoArea9PT() {
	return $this->trabalhoArea9PT;
}
function getTrabalhoArea10PT() {
	return $this->trabalhoArea10PT;
}
function getTrabalhoArea11PT() {
	return $this->trabalhoArea11PT;
}
function getTrabalhoArea12PT() {
	return $this->trabalhoArea12PT;
}
function getTrabalhoArea13PT() {
	return $this->trabalhoArea13PT;
}
function getTrabalhoArea14PT() {
	return $this->trabalhoArea14PT;
}
function getTrabalhoArea15PT() {
	return $this->trabalhoArea15PT;
}
function getTrabalhoArea16PT() {
	return $this->trabalhoArea16PT;
}
function getTrabalhoArea17PT() {
	return $this->trabalhoArea17PT;
}
function getTrabalhoArea18PT() {
	return $this->trabalhoArea18PT;
}
function getTrabalhoArea19PT() {
	return $this->trabalhoArea19PT;
}
function getTrabalhoArea20PT() {
	return $this->trabalhoArea20PT;
}
function getTrabalhoArea1EN() {
	return $this->trabalhoArea1EN;
}
function getTrabalhoArea2EN() {
	return $this->trabalhoArea2EN;
}
function getTrabalhoArea3EN() {
	return $this->trabalhoArea3EN;
}
function getTrabalhoArea4EN() {
	return $this->trabalhoArea4EN;
}
function getTrabalhoArea5EN() {
	return $this->trabalhoArea5EN;
}
function getTrabalhoArea6EN() {
	return $this->trabalhoArea6EN;
}
function getTrabalhoArea7EN() {
	return $this->trabalhoArea7EN;
}
function getTrabalhoArea8EN() {
	return $this->trabalhoArea8EN;
}
function getTrabalhoArea9EN() {
	return $this->trabalhoArea9EN;
}
function getTrabalhoArea10EN() {
	return $this->trabalhoArea10EN;
}
function getTrabalhoArea11EN() {
	return $this->trabalhoArea11EN;
}
function getTrabalhoArea12EN() {
	return $this->trabalhoArea12EN;
}
function getTrabalhoArea13EN() {
	return $this->trabalhoArea13EN;
}
function getTrabalhoArea14EN() {
	return $this->trabalhoArea14EN;
}
function getTrabalhoArea15EN() {
	return $this->trabalhoArea15EN;
}
function getTrabalhoArea16EN() {
	return $this->trabalhoArea16EN;
}
function getTrabalhoArea17EN() {
	return $this->trabalhoArea17EN;
}
function getTrabalhoArea18EN() {
	return $this->trabalhoArea18EN;
}
function getTrabalhoArea19EN() {
	return $this->trabalhoArea19EN;
}
function getTrabalhoArea20EN() {
	return $this->trabalhoArea20EN;
}
function getTrabalhoArea1ES() {
	return $this->trabalhoArea1ES;
}
function getTrabalhoArea2ES() {
	return $this->trabalhoArea2ES;
}
function getTrabalhoArea3ES() {
	return $this->trabalhoArea3ES;
}
function getTrabalhoArea4ES() {
	return $this->trabalhoArea4ES;
}
function getTrabalhoArea5ES() {
	return $this->trabalhoArea5ES;
}
function getTrabalhoArea6ES() {
	return $this->trabalhoArea6ES;
}
function getTrabalhoArea7ES() {
	return $this->trabalhoArea7ES;
}
function getTrabalhoArea8ES() {
	return $this->trabalhoArea8ES;
}
function getTrabalhoArea9ES() {
	return $this->trabalhoArea9ES;
}
function getTrabalhoArea10ES() {
	return $this->trabalhoArea10ES;
}
function getTrabalhoArea11ES() {
	return $this->trabalhoArea11ES;
}
function getTrabalhoArea12ES() {
	return $this->trabalhoArea12ES;
}
function getTrabalhoArea13ES() {
	return $this->trabalhoArea13ES;
}
function getTrabalhoArea14ES() {
	return $this->trabalhoArea14ES;
}
function getTrabalhoArea15ES() {
	return $this->trabalhoArea15ES;
}
function getTrabalhoArea16ES() {
	return $this->trabalhoArea16ES;
}
function getTrabalhoArea17ES() {
	return $this->trabalhoArea17ES;
}
function getTrabalhoArea18ES() {
	return $this->trabalhoArea18ES;
}
function getTrabalhoArea19ES() {
	return $this->trabalhoArea19ES;
}
function getTrabalhoArea20ES() {
	return $this->trabalhoArea20ES;
}
function getTrabalhoEmailAvaliadorConvitePT() {
	return $this->trabalhoEmailAvaliadorConvitePT;
}
function getTrabalhoEmailAvaliadorConviteEN() {
	return $this->trabalhoEmailAvaliadorConviteEN;
}
function getTrabalhoEmailAvaliadorConviteES() {
	return $this->trabalhoEmailAvaliadorConviteES;
}
function getTrabalhoEmailSubmissaoPT() {
	return $this->trabalhoEmailSubmissaoPT;
}
function getTrabalhoEmailSubmissaoEN() {
	return $this->trabalhoEmailSubmissaoEN;
}
function getTrabalhoEmailSubmissaoES() {
	return $this->trabalhoEmailSubmissaoES;
}
function getTrabalhoEmailAceitoPT() {
	return $this->trabalhoEmailAceitoPT;
}
function getTrabalhoEmailAceitoEN() {
	return $this->trabalhoEmailAceitoEN;
}
function getTrabalhoEmailAceitoES() {
	return $this->trabalhoEmailAceitoES;
}
function getTrabalhoEmailAceitoComRestricoesPT() {
	return $this->trabalhoEmailAceitoComRestricoesPT;
}
function getTrabalhoEmailAceitoComRestricoesEN() {
	return $this->trabalhoEmailAceitoComRestricoesEN;
}
function getTrabalhoEmailAceitoComRestricoesES() {
	return $this->trabalhoEmailAceitoComRestricoesES;
}
function getTrabalhoEmailRejeitadoPT() {
	return $this->trabalhoEmailRejeitadoPT;
}
function getTrabalhoEmailRejeitadoEN() {
	return $this->trabalhoEmailRejeitadoEN;
}
function getTrabalhoEmailRejeitadoES() {
	return $this->trabalhoEmailRejeitadoES;
}
function getTrabalhoTelaSubmissaoPT() {
	return $this->trabalhoTelaSubmissaoPT;
}
function getTrabalhoTelaSubmissaoEN() {
	return $this->trabalhoTelaSubmissaoEN;
}
function getTrabalhoTelaSubmissaoES() {
	return $this->trabalhoTelaSubmissaoES;
}
function getTrabalhoTelaSubmissaoOkPT() {
	return $this->trabalhoTelaSubmissaoOkPT;
}
function getTrabalhoTelaSubmissaoOkEN() {
	return $this->trabalhoTelaSubmissaoOkEN;
}
function getTrabalhoTelaSubmissaoOkES() {
	return $this->trabalhoTelaSubmissaoOkES;
}



/**
 * Métodos GET para buscar variável passando o idioma
 */
function getInscricaoCategoriaA($lang) {
	return $this->{"getInscricaoCategoriaA_".$lang}();
}
function getInscricaoCategoriaB($lang) {
	return $this->{"getInscricaoCategoriaB_".$lang}();
}
function getInscricaoCategoriaC($lang) {
	return $this->{"getInscricaoCategoriaC_".$lang}();
}
function getInscricaoCategoriaD($lang) {
	return $this->{"getInscricaoCategoriaD_".$lang}();
}
function getInscricaoCategoriaE($lang) {
	return $this->{"getInscricaoCategoriaE_".$lang}();
}
function getInscricaoCategoriaF($lang) {
	return $this->{"getInscricaoCategoriaF_".$lang}();
}
function getInscricaoCategoriaG($lang) {
	return $this->{"getInscricaoCategoriaG_".$lang}();
}
function getInscricaoCategoriaH($lang) {
	return $this->{"getInscricaoCategoriaH_".$lang}();
}
function getInscricaoCategoriaI($lang) {
	return $this->{"getInscricaoCategoriaI_".$lang}();
}
function getInscricaoCategoriaJ($lang) {
	return $this->{"getInscricaoCategoriaJ_".$lang}();
}
function getInscricaoCategoriaK($lang) {
	return $this->{"getInscricaoCategoriaK_".$lang}();
}
function getInscricaoCategoriaL($lang) {
	return $this->{"getInscricaoCategoriaL_".$lang}();
}
function getInscricaoCategoriaM($lang) {
	return $this->{"getInscricaoCategoriaM_".$lang}();
}
function getInscricaoCategoriaN($lang) {
	return $this->{"getInscricaoCategoriaN_".$lang}();
}
function getInscricaoCategoriaO($lang) {
	return $this->{"getInscricaoCategoriaO_".$lang}();
}
function getInscricaoCategoriaP($lang) {
	return $this->{"getInscricaoCategoriaP_".$lang}();
}
function getInscricaoCategoriaQ($lang) {
	return $this->{"getInscricaoCategoriaQ_".$lang}();
}
function getInscricaoCategoriaR($lang) {
	return $this->{"getInscricaoCategoriaR_".$lang}();
}
function getInscricaoCategoriaS($lang) {
	return $this->{"getInscricaoCategoriaS_".$lang}();
}
function getInscricaoCategoriaT($lang) {
	return $this->{"getInscricaoCategoriaT_".$lang}();
}
function getInscricaoCategoriaU($lang) {
	return $this->{"getInscricaoCategoriaU_".$lang}();
}
function getInscricaoCategoriaV($lang) {
	return $this->{"getInscricaoCategoriaV_".$lang}();
}
function getInscricaoCategoriaW($lang) {
	return $this->{"getInscricaoCategoriaW_".$lang}();
}
function getInscricaoCategoriaX($lang) {
	return $this->{"getInscricaoCategoriaX_".$lang}();
}
function getInscricaoCategoriaY($lang) {
	return $this->{"getInscricaoCategoriaY_".$lang}();
}
function getInscricaoCategoriaZ($lang) {
	return $this->{"getInscricaoCategoriaZ_".$lang}();
}
function getInscricaoOpcao1($lang) {
	return $this->{"getInscricaoOpcao1_".$lang}();
}
function getInscricaoOpcao2($lang) {
	return $this->{"getInscricaoOpcao2_".$lang}();
}
function getInscricaoOpcao3($lang) {
	return $this->{"getInscricaoOpcao3_".$lang}();
}
function getInscricaoOpcao4($lang) {
	return $this->{"getInscricaoOpcao4_".$lang}();
}
function getInscricaoOpcao5($lang) {
	return $this->{"getInscricaoOpcao5_".$lang}();
}
function getInscricaoOpcao6($lang) {
	return $this->{"getInscricaoOpcao6_".$lang}();
}
function getInscricaoTexto1($lang) {
	return $this->{"getInscricaoTexto1_".$lang}();
}
function getInscricaoTexto2($lang) {
	return $this->{"getInscricaoTexto2_".$lang}();
}
function getInscricaoTexto3($lang) {
	return $this->{"getInscricaoTexto3_".$lang}();
}
function getInscricaoTexto4($lang) {
	return $this->{"getInscricaoTexto4_".$lang}();
}
function getInscricaoTexto5($lang) {
	return $this->{"getInscricaoTexto5_".$lang}();
}
function getInscricaoTexto6($lang) {
	return $this->{"getInscricaoTexto6_".$lang}();
}
function getInscricaoTexto7($lang) {
	return $this->{"getInscricaoTexto7_".$lang}();
}
function getInscricaoTexto8($lang) {
	return $this->{"getInscricaoTexto8_".$lang}();
}
function getInscricaoTexto9($lang) {
	return $this->{"getInscricaoTexto9_".$lang}();
}
function getInscricaoTexto10($lang) {
	return $this->{"getInscricaoTexto10_".$lang}();
}
function getInscricaoBool1($lang) {
	return $this->{"getInscricaoBool1_".$lang}();
}
function getInscricaoBool2($lang) {
	return $this->{"getInscricaoBool2_".$lang}();
}
function getInscricaoBool3($lang) {
	return $this->{"getInscricaoBool3_".$lang}();
}
function getInscricaoBool4($lang) {
	return $this->{"getInscricaoBool4_".$lang}();
}
function getInscricaoBool5($lang) {
	return $this->{"getInscricaoBool5_".$lang}();
}
function getInscricaoBool6($lang) {
	return $this->{"getInscricaoBool6_".$lang}();
}
function getInscricaoBool7($lang) {
	return $this->{"getInscricaoBool7_".$lang}();
}
function getInscricaoBool8($lang) {
	return $this->{"getInscricaoBool8_".$lang}();
}
function getInscricaoBool9($lang) {
	return $this->{"getInscricaoBool9_".$lang}();
}
function getInscricaoBool10($lang) {
	return $this->{"getInscricaoBool10_".$lang}();
}
function getInscricaoBool11($lang) {
	return $this->{"getInscricaoBool11_".$lang}();
}
function getInscricaoBool12($lang) {
	return $this->{"getInscricaoBool12_".$lang}();
}
function getInscricaoBool13($lang) {
	return $this->{"getInscricaoBool13_".$lang}();
}
function getInscricaoBool14($lang) {
	return $this->{"getInscricaoBool14_".$lang}();
}
function getInscricaoBool15($lang) {
	return $this->{"getInscricaoBool15_".$lang}();
}
function getInscricaoBool16($lang) {
	return $this->{"getInscricaoBool16_".$lang}();
}
function getInscricaoBool17($lang) {
	return $this->{"getInscricaoBool17_".$lang}();
}
function getInscricaoBool18($lang) {
	return $this->{"getInscricaoBool18_".$lang}();
}
function getInscricaoBool19($lang) {
	return $this->{"getInscricaoBool19_".$lang}();
}
function getInscricaoBool20($lang) {
	return $this->{"getInscricaoBool20_".$lang}();
}
function getInscricaoCurso1($lang) {
	return $this->{"getInscricaoCurso1_".$lang}();
}
function getInscricaoCurso2($lang) {
	return $this->{"getInscricaoCurso2_".$lang}();
}
function getInscricaoCurso3($lang) {
	return $this->{"getInscricaoCurso3_".$lang}();
}
function getInscricaoCurso4($lang) {
	return $this->{"getInscricaoCurso4_".$lang}();
}
function getInscricaoCurso5($lang) {
	return $this->{"getInscricaoCurso5_".$lang}();
}
function getInscricaoCurso6($lang) {
	return $this->{"getInscricaoCurso6_".$lang}();
}
function getInscricaoCurso7($lang) {
	return $this->{"getInscricaoCurso7_".$lang}();
}
function getInscricaoCurso8($lang) {
	return $this->{"getInscricaoCurso8_".$lang}();
}
function getInscricaoCurso9($lang) {
	return $this->{"getInscricaoCurso9_".$lang}();
}
function getInscricaoCurso10($lang) {
	return $this->{"getInscricaoCurso10_".$lang}();
}
function getInscricaoCurso11($lang) {
	return $this->{"getInscricaoCurso11_".$lang}();
}
function getInscricaoCurso12($lang) {
	return $this->{"getInscricaoCurso12_".$lang}();
}
function getInscricaoCurso13($lang) {
	return $this->{"getInscricaoCurso13_".$lang}();
}
function getInscricaoCurso14($lang) {
	return $this->{"getInscricaoCurso14_".$lang}();
}
function getInscricaoCurso15($lang) {
	return $this->{"getInscricaoCurso15_".$lang}();
}
function getInscricaoCurso16($lang) {
	return $this->{"getInscricaoCurso16_".$lang}();
}
function getInscricaoCurso17($lang) {
	return $this->{"getInscricaoCurso17_".$lang}();
}
function getInscricaoCurso18($lang) {
	return $this->{"getInscricaoCurso18_".$lang}();
}
function getInscricaoCurso19($lang) {
	return $this->{"getInscricaoCurso19_".$lang}();
}
function getInscricaoCurso20($lang) {
	return $this->{"getInscricaoCurso20_".$lang}();
}
function getInscricaoCurso21($lang) {
	return $this->{"getInscricaoCurso21_".$lang}();
}
function getInscricaoCurso22($lang) {
	return $this->{"getInscricaoCurso22_".$lang}();
}
function getInscricaoCurso23($lang) {
	return $this->{"getInscricaoCurso23_".$lang}();
}
function getInscricaoCurso24($lang) {
	return $this->{"getInscricaoCurso24_".$lang}();
}
function getInscricaoCurso25($lang) {
	return $this->{"getInscricaoCurso25_".$lang}();
}
function getInscricaoCurso26($lang) {
	return $this->{"getInscricaoCurso26_".$lang}();
}
function getInscricaoCurso27($lang) {
	return $this->{"getInscricaoCurso27_".$lang}();
}
function getInscricaoCurso28($lang) {
	return $this->{"getInscricaoCurso28_".$lang}();
}
function getInscricaoCurso29($lang) {
	return $this->{"getInscricaoCurso29_".$lang}();
}
function getInscricaoCurso30($lang) {
	return $this->{"getInscricaoCurso30_".$lang}();
}
function getInscricaoDadosDeposito($lang) {
	return $this->{"getInscricaoDadosDeposito".$lang}();
}
function getInscricaoTelaSubmissao($lang) {
	return $this->{"getInscricaoTelaSubmissao".$lang}();
}
function getInscricaoTelaSubmissaoDeposito($lang) {
	return $this->{"getInscricaoTelaSubmissaoDeposito".$lang}();
}
function getInscricaoEmailSubmissao($lang) {
	return $this->{"getInscricaoEmailSubmissao".$lang}();
}
function getTrabalhoArea1($lang) {
	return $this->{"getTrabalhoArea1".$lang}();
}
function getTrabalhoArea2($lang) {
	return $this->{"getTrabalhoArea2".$lang}();
}
function getTrabalhoArea3($lang) {
	return $this->{"getTrabalhoArea3".$lang}();
}
function getTrabalhoArea4($lang) {
	return $this->{"getTrabalhoArea4".$lang}();
}
function getTrabalhoArea5($lang) {
	return $this->{"getTrabalhoArea5".$lang}();
}
function getTrabalhoArea6($lang) {
	return $this->{"getTrabalhoArea6".$lang}();
}
function getTrabalhoArea7($lang) {
	return $this->{"getTrabalhoArea7".$lang}();
}
function getTrabalhoArea8($lang) {
	return $this->{"getTrabalhoArea8".$lang}();
}
function getTrabalhoArea9($lang) {
	return $this->{"getTrabalhoArea9".$lang}();
}
function getTrabalhoArea10($lang) {
	return $this->{"getTrabalhoArea10".$lang}();
}
function getTrabalhoArea11($lang) {
	return $this->{"getTrabalhoArea11".$lang}();
}
function getTrabalhoArea12($lang) {
	return $this->{"getTrabalhoArea12".$lang}();
}
function getTrabalhoArea13($lang) {
	return $this->{"getTrabalhoArea13".$lang}();
}
function getTrabalhoArea14($lang) {
	return $this->{"getTrabalhoArea14".$lang}();
}
function getTrabalhoArea15($lang) {
	return $this->{"getTrabalhoArea15".$lang}();
}
function getTrabalhoArea16($lang) {
	return $this->{"getTrabalhoArea16".$lang}();
}
function getTrabalhoArea17($lang) {
	return $this->{"getTrabalhoArea17".$lang}();
}
function getTrabalhoArea18($lang) {
	return $this->{"getTrabalhoArea18".$lang}();
}
function getTrabalhoArea19($lang) {
	return $this->{"getTrabalhoArea19".$lang}();
}
function getTrabalhoArea20($lang) {
	return $this->{"getTrabalhoArea20".$lang}();
}
function getTrabalhoAvaliacaoDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoDescricao".$lang}();
}
function getTrabalhoAvaliacaoNotaADescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaADescricao".$lang}();
}
function getTrabalhoAvaliacaoNotaBDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaBDescricao".$lang}();
}
function getTrabalhoAvaliacaoNotaCDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaCDescricao".$lang}();
}
function getTrabalhoAvaliacaoNotaDDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaDDescricao".$lang}();
}
function getTrabalhoAvaliacaoNotaEDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaEDescricao".$lang}();
}

function getTrabalhoAvaliacaoNotaFDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaFDescricao".$lang}();
}

function getTrabalhoAvaliacaoNotaGDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaGDescricao".$lang}();
}

function getTrabalhoAvaliacaoNotaHDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaHDescricao".$lang}();
}

function getTrabalhoAvaliacaoNotaIDescricao($lang) {
	return $this->{"getTrabalhoAvaliacaoNotaIDescricao".$lang}();
}

function getTrabalhoEmailAceito($lang) {
	return $this->{"getTrabalhoEmailAceito".$lang}();
}
function getTrabalhoEmailAceitoComRestricoes($lang) {
	return $this->{"getTrabalhoEmailAceitoComRestricoes".$lang}();
}
function getTrabalhoEmailAvaliadorConvite($lang) {
	return $this->{"getTrabalhoEmailAvaliadorConvite".$lang}();
}
function getTrabalhoEmailRejeitado($lang) {
	return $this->{"getTrabalhoEmailRejeitado".$lang}();
}
function getTrabalhoEmailSubmissao($lang) {
	return $this->{"getTrabalhoEmailSubmissao".$lang}();
}
function getTrabalhoTelaSubmissao($lang) {
	return $this->{"getTrabalhoTelaSubmissao".$lang}();
}
function getTrabalhoTelaSubmissaoOk($lang) {
	return $this->{"getTrabalhoTelaSubmissaoOk".$lang}();
}


/**
 * Métodos GET para buscar variável passando a referencia do item e o idioma
 */
function getInscricaoCategoria($item,$lang) {
	return $this->{"getInscricaoCategoria".$item."_".$lang}();
}
function getInscricaoOpcao($item,$lang) {
	return $this->{"getInscricaoOpcao".$item."_".$lang}();
}
function getInscricaoBool($item,$lang) {
	return $this->{"getInscricaoBool".$item."_".$lang}();
}
function getInscricaoTexto($item,$lang) {
	return $this->{"getInscricaoTexto".$item."_".$lang}();
}
function getInscricaoCurso($item,$lang) {
	return $this->{"getInscricaoCurso".$item."_".$lang}();
}
function getTrabalhoArea($item,$lang) {
	return $this->{"getTrabalhoArea".$item."".$lang}();
}


/**
 * Calcula o valor total dos cursos passados no array
 *
 * @param String $array
 * @return int
 */
function getCursoPrecoTotal($cursosArray) {
	$valorTotal = 0;
	if (sizeof($cursosArray)>0) {
		foreach ($cursosArray as $curso) {
			if ($curso) {
				$valor = $this->{"getInscricaoCurso".$curso."Preco"}();
				$valorTotal += $valor;
			}
		}
	}
	return $valorTotal;
}


/**
 * Métodos SET 
 * */

function setEventoAlias($val) {
	$this->eventoAlias = $val;
}
function setEmailInscricao($val) {
	$this->emailInscricao = $val;
}
function setEmailTrabalho($val) {
	$this->emailTrabalho = $val;
}
function setInscricaoCategoriaA_PT($val) {
	$this->inscricaoCategoriaA_PT = $val;
}
function setInscricaoCategoriaB_PT($val) {
	$this->inscricaoCategoriaB_PT = $val;
}
function setInscricaoCategoriaC_PT($val) {
	$this->inscricaoCategoriaC_PT = $val;
}
function setInscricaoCategoriaD_PT($val) {
	$this->inscricaoCategoriaD_PT = $val;
}
function setInscricaoCategoriaE_PT($val) {
	$this->inscricaoCategoriaE_PT = $val;
}
function setInscricaoCategoriaF_PT($val) {
	$this->inscricaoCategoriaF_PT = $val;
}
function setInscricaoCategoriaG_PT($val) {
	$this->inscricaoCategoriaG_PT = $val;
}
function setInscricaoCategoriaH_PT($val) {
	$this->inscricaoCategoriaH_PT = $val;
}
function setInscricaoCategoriaI_PT($val) {
	$this->inscricaoCategoriaI_PT = $val;
}
function setInscricaoCategoriaJ_PT($val) {
	$this->inscricaoCategoriaJ_PT = $val;
}
function setInscricaoCategoriaK_PT($val) {
	$this->inscricaoCategoriaK_PT = $val;
}
function setInscricaoCategoriaL_PT($val) {
	$this->inscricaoCategoriaL_PT = $val;
}
function setInscricaoCategoriaM_PT($val) {
	$this->inscricaoCategoriaM_PT = $val;
}
function setInscricaoCategoriaN_PT($val) {
	$this->inscricaoCategoriaN_PT = $val;
}
function setInscricaoCategoriaO_PT($val) {
	$this->inscricaoCategoriaO_PT = $val;
}
function setInscricaoCategoriaP_PT($val) {
	$this->inscricaoCategoriaP_PT = $val;
}
function setInscricaoCategoriaQ_PT($val) {
	$this->inscricaoCategoriaQ_PT = $val;
}
function setInscricaoCategoriaR_PT($val) {
	$this->inscricaoCategoriaR_PT = $val;
}
function setInscricaoCategoriaS_PT($val) {
	$this->inscricaoCategoriaS_PT = $val;
}
function setInscricaoCategoriaT_PT($val) {
	$this->inscricaoCategoriaT_PT = $val;
}
function setInscricaoCategoriaU_PT($val) {
	$this->inscricaoCategoriaU_PT = $val;
}
function setInscricaoCategoriaV_PT($val) {
	$this->inscricaoCategoriaV_PT = $val;
}
function setInscricaoCategoriaW_PT($val) {
	$this->inscricaoCategoriaW_PT = $val;
}
function setInscricaoCategoriaX_PT($val) {
	$this->inscricaoCategoriaX_PT = $val;
}
function setInscricaoCategoriaY_PT($val) {
	$this->inscricaoCategoriaY_PT = $val;
}
function setInscricaoCategoriaZ_PT($val) {
	$this->inscricaoCategoriaZ_PT = $val;
}
function setInscricaoCategoriaA_EN($val) {
	$this->inscricaoCategoriaA_EN = $val;
}
function setInscricaoCategoriaB_EN($val) {
	$this->inscricaoCategoriaB_EN = $val;
}
function setInscricaoCategoriaC_EN($val) {
	$this->inscricaoCategoriaC_EN = $val;
}
function setInscricaoCategoriaD_EN($val) {
	$this->inscricaoCategoriaD_EN = $val;
}
function setInscricaoCategoriaE_EN($val) {
	$this->inscricaoCategoriaE_EN = $val;
}
function setInscricaoCategoriaF_EN($val) {
	$this->inscricaoCategoriaF_EN = $val;
}
function setInscricaoCategoriaG_EN($val) {
	$this->inscricaoCategoriaG_EN = $val;
}
function setInscricaoCategoriaH_EN($val) {
	$this->inscricaoCategoriaH_EN = $val;
}
function setInscricaoCategoriaI_EN($val) {
	$this->inscricaoCategoriaI_EN = $val;
}
function setInscricaoCategoriaJ_EN($val) {
	$this->inscricaoCategoriaJ_EN = $val;
}
function setInscricaoCategoriaK_EN($val) {
	$this->inscricaoCategoriaK_EN = $val;
}
function setInscricaoCategoriaL_EN($val) {
	$this->inscricaoCategoriaL_EN = $val;
}
function setInscricaoCategoriaM_EN($val) {
	$this->inscricaoCategoriaM_EN = $val;
}
function setInscricaoCategoriaN_EN($val) {
	$this->inscricaoCategoriaN_EN = $val;
}
function setInscricaoCategoriaO_EN($val) {
	$this->inscricaoCategoriaO_EN = $val;
}
function setInscricaoCategoriaP_EN($val) {
	$this->inscricaoCategoriaP_EN = $val;
}
function setInscricaoCategoriaQ_EN($val) {
	$this->inscricaoCategoriaQ_EN = $val;
}
function setInscricaoCategoriaR_EN($val) {
	$this->inscricaoCategoriaR_EN = $val;
}
function setInscricaoCategoriaS_EN($val) {
	$this->inscricaoCategoriaS_EN = $val;
}
function setInscricaoCategoriaT_EN($val) {
	$this->inscricaoCategoriaT_EN = $val;
}
function setInscricaoCategoriaU_EN($val) {
	$this->inscricaoCategoriaU_EN = $val;
}
function setInscricaoCategoriaV_EN($val) {
	$this->inscricaoCategoriaV_EN = $val;
}
function setInscricaoCategoriaW_EN($val) {
	$this->inscricaoCategoriaW_EN = $val;
}
function setInscricaoCategoriaX_EN($val) {
	$this->inscricaoCategoriaX_EN = $val;
}
function setInscricaoCategoriaY_EN($val) {
	$this->inscricaoCategoriaY_EN = $val;
}
function setInscricaoCategoriaZ_EN($val) {
	$this->inscricaoCategoriaZ_EN = $val;
}
function setInscricaoCategoriaA_ES($val) {
	$this->inscricaoCategoriaA_ES = $val;
}
function setInscricaoCategoriaB_ES($val) {
	$this->inscricaoCategoriaB_ES = $val;
}
function setInscricaoCategoriaC_ES($val) {
	$this->inscricaoCategoriaC_ES = $val;
}
function setInscricaoCategoriaD_ES($val) {
	$this->inscricaoCategoriaD_ES = $val;
}
function setInscricaoCategoriaE_ES($val) {
	$this->inscricaoCategoriaE_ES = $val;
}
function setInscricaoCategoriaF_ES($val) {
	$this->inscricaoCategoriaF_ES = $val;
}
function setInscricaoCategoriaG_ES($val) {
	$this->inscricaoCategoriaG_ES = $val;
}
function setInscricaoCategoriaH_ES($val) {
	$this->inscricaoCategoriaH_ES = $val;
}
function setInscricaoCategoriaI_ES($val) {
	$this->inscricaoCategoriaI_ES = $val;
}
function setInscricaoCategoriaJ_ES($val) {
	$this->inscricaoCategoriaJ_ES = $val;
}
function setInscricaoCategoriaK_ES($val) {
	$this->inscricaoCategoriaK_ES = $val;
}
function setInscricaoCategoriaL_ES($val) {
	$this->inscricaoCategoriaL_ES = $val;
}
function setInscricaoCategoriaM_ES($val) {
	$this->inscricaoCategoriaM_ES = $val;
}
function setInscricaoCategoriaN_ES($val) {
	$this->inscricaoCategoriaN_ES = $val;
}
function setInscricaoCategoriaO_ES($val) {
	$this->inscricaoCategoriaO_ES = $val;
}
function setInscricaoCategoriaP_ES($val) {
	$this->inscricaoCategoriaP_ES = $val;
}
function setInscricaoCategoriaQ_ES($val) {
	$this->inscricaoCategoriaQ_ES = $val;
}
function setInscricaoCategoriaR_ES($val) {
	$this->inscricaoCategoriaR_ES = $val;
}
function setInscricaoCategoriaS_ES($val) {
	$this->inscricaoCategoriaS_ES = $val;
}
function setInscricaoCategoriaT_ES($val) {
	$this->inscricaoCategoriaT_ES = $val;
}
function setInscricaoCategoriaU_ES($val) {
	$this->inscricaoCategoriaU_ES = $val;
}
function setInscricaoCategoriaV_ES($val) {
	$this->inscricaoCategoriaV_ES = $val;
}
function setInscricaoCategoriaW_ES($val) {
	$this->inscricaoCategoriaW_ES = $val;
}
function setInscricaoCategoriaX_ES($val) {
	$this->inscricaoCategoriaX_ES = $val;
}
function setInscricaoCategoriaY_ES($val) {
	$this->inscricaoCategoriaY_ES = $val;
}
function setInscricaoCategoriaZ_ES($val) {
	$this->inscricaoCategoriaZ_ES = $val;
}
function setInscricaoOpcao1_PT($val) {
	$this->inscricaoOpcao1_PT = $val;
}
function setInscricaoOpcao2_PT($val) {
	$this->inscricaoOpcao2_PT = $val;
}
function setInscricaoOpcao3_PT($val) {
	$this->inscricaoOpcao3_PT = $val;
}
function setInscricaoOpcao4_PT($val) {
	$this->inscricaoOpcao4_PT = $val;
}
function setInscricaoOpcao5_PT($val) {
	$this->inscricaoOpcao5_PT = $val;
}
function setInscricaoOpcao6_PT($val) {
	$this->inscricaoOpcao6_PT = $val;
}
function setInscricaoOpcao1_EN($val) {
	$this->inscricaoOpcao1_EN = $val;
}
function setInscricaoOpcao2_EN($val) {
	$this->inscricaoOpcao2_EN = $val;
}
function setInscricaoOpcao3_EN($val) {
	$this->inscricaoOpcao3_EN = $val;
}
function setInscricaoOpcao4_EN($val) {
	$this->inscricaoOpcao4_EN = $val;
}
function setInscricaoOpcao5_EN($val) {
	$this->inscricaoOpcao5_EN = $val;
}
function setInscricaoOpcao6_EN($val) {
	$this->inscricaoOpcao6_EN = $val;
}
function setInscricaoOpcao1_ES($val) {
	$this->inscricaoOpcao1_ES = $val;
}
function setInscricaoOpcao2_ES($val) {
	$this->inscricaoOpcao2_ES = $val;
}
function setInscricaoOpcao3_ES($val) {
	$this->inscricaoOpcao3_ES = $val;
}
function setInscricaoOpcao4_ES($val) {
	$this->inscricaoOpcao4_ES = $val;
}
function setInscricaoOpcao5_ES($val) {
	$this->inscricaoOpcao5_ES = $val;
}
function setInscricaoOpcao6_ES($val) {
	$this->inscricaoOpcao6_ES = $val;
}
function setInscricaoTexto1_PT($val) {
	$this->inscricaoTexto1_PT = $val;
}
function setInscricaoTexto2_PT($val) {
	$this->inscricaoTexto2_PT = $val;
}
function setInscricaoTexto3_PT($val) {
	$this->inscricaoTexto3_PT = $val;
}
function setInscricaoTexto4_PT($val) {
	$this->inscricaoTexto4_PT = $val;
}
function setInscricaoTexto5_PT($val) {
	$this->inscricaoTexto5_PT = $val;
}
function setInscricaoTexto6_PT($val) {
	$this->inscricaoTexto6_PT = $val;
}
function setInscricaoTexto7_PT($val) {
	$this->inscricaoTexto7_PT = $val;
}
function setInscricaoTexto8_PT($val) {
	$this->inscricaoTexto8_PT = $val;
}
function setInscricaoTexto9_PT($val) {
	$this->inscricaoTexto9_PT = $val;
}
function setInscricaoTexto10_PT($val) {
	$this->inscricaoTexto10_PT = $val;
}
function setInscricaoTexto1_EN($val) {
	$this->inscricaoTexto1_EN = $val;
}
function setInscricaoTexto2_EN($val) {
	$this->inscricaoTexto2_EN = $val;
}
function setInscricaoTexto3_EN($val) {
	$this->inscricaoTexto3_EN = $val;
}
function setInscricaoTexto4_EN($val) {
	$this->inscricaoTexto4_EN = $val;
}
function setInscricaoTexto5_EN($val) {
	$this->inscricaoTexto5_EN = $val;
}
function setInscricaoTexto6_EN($val) {
	$this->inscricaoTexto6_EN = $val;
}
function setInscricaoTexto7_EN($val) {
	$this->inscricaoTexto7_EN = $val;
}
function setInscricaoTexto8_EN($val) {
	$this->inscricaoTexto8_EN = $val;
}
function setInscricaoTexto9_EN($val) {
	$this->inscricaoTexto9_EN = $val;
}
function setInscricaoTexto10_EN($val) {
	$this->inscricaoTexto10_EN = $val;
}
function setInscricaoTexto1_ES($val) {
	$this->inscricaoTexto1_ES = $val;
}
function setInscricaoTexto2_ES($val) {
	$this->inscricaoTexto2_ES = $val;
}
function setInscricaoTexto3_ES($val) {
	$this->inscricaoTexto3_ES = $val;
}
function setInscricaoTexto4_ES($val) {
	$this->inscricaoTexto4_ES = $val;
}
function setInscricaoTexto5_ES($val) {
	$this->inscricaoTexto5_ES = $val;
}
function setInscricaoTexto6_ES($val) {
	$this->inscricaoTexto6_ES = $val;
}
function setInscricaoTexto7_ES($val) {
	$this->inscricaoTexto7_ES = $val;
}
function setInscricaoTexto8_ES($val) {
	$this->inscricaoTexto8_ES = $val;
}
function setInscricaoTexto9_ES($val) {
	$this->inscricaoTexto9_ES = $val;
}
function setInscricaoTexto10_ES($val) {
	$this->inscricaoTexto10_ES = $val;
}
function setInscricaoBool1_PT($val) {
	$this->inscricaoBool1_PT = $val;
}
function setInscricaoBool2_PT($val) {
	$this->inscricaoBool2_PT = $val;
}
function setInscricaoBool3_PT($val) {
	$this->inscricaoBool3_PT = $val;
}
function setInscricaoBool4_PT($val) {
	$this->inscricaoBool4_PT = $val;
}
function setInscricaoBool5_PT($val) {
	$this->inscricaoBool5_PT = $val;
}
function setInscricaoBool6_PT($val) {
	$this->inscricaoBool6_PT = $val;
}
function setInscricaoBool7_PT($val) {
	$this->inscricaoBool7_PT = $val;
}
function setInscricaoBool8_PT($val) {
	$this->inscricaoBool8_PT = $val;
}
function setInscricaoBool9_PT($val) {
	$this->inscricaoBool9_PT = $val;
}
function setInscricaoBool10_PT($val) {
	$this->inscricaoBool10_PT = $val;
}
function setInscricaoBool11_PT($val) {
	$this->inscricaoBool11_PT = $val;
}
function setInscricaoBool12_PT($val) {
	$this->inscricaoBool12_PT = $val;
}
function setInscricaoBool13_PT($val) {
	$this->inscricaoBool13_PT = $val;
}
function setInscricaoBool14_PT($val) {
	$this->inscricaoBool14_PT = $val;
}
function setInscricaoBool15_PT($val) {
	$this->inscricaoBool15_PT = $val;
}
function setInscricaoBool16_PT($val) {
	$this->inscricaoBool16_PT = $val;
}
function setInscricaoBool17_PT($val) {
	$this->inscricaoBool17_PT = $val;
}
function setInscricaoBool18_PT($val) {
	$this->inscricaoBool18_PT = $val;
}
function setInscricaoBool19_PT($val) {
	$this->inscricaoBool19_PT = $val;
}
function setInscricaoBool20_PT($val) {
	$this->inscricaoBool20_PT = $val;
}
function setInscricaoBool1_EN($val) {
	$this->inscricaoBool1_EN = $val;
}
function setInscricaoBool2_EN($val) {
	$this->inscricaoBool2_EN = $val;
}
function setInscricaoBool3_EN($val) {
	$this->inscricaoBool3_EN = $val;
}
function setInscricaoBool4_EN($val) {
	$this->inscricaoBool4_EN = $val;
}
function setInscricaoBool5_EN($val) {
	$this->inscricaoBool5_EN = $val;
}
function setInscricaoBool6_EN($val) {
	$this->inscricaoBool6_EN = $val;
}
function setInscricaoBool7_EN($val) {
	$this->inscricaoBool7_EN = $val;
}
function setInscricaoBool8_EN($val) {
	$this->inscricaoBool8_EN = $val;
}
function setInscricaoBool9_EN($val) {
	$this->inscricaoBool9_EN = $val;
}
function setInscricaoBool10_EN($val) {
	$this->inscricaoBool10_EN = $val;
}
function setInscricaoBool11_EN($val) {
	$this->inscricaoBool11_EN = $val;
}
function setInscricaoBool12_EN($val) {
	$this->inscricaoBool12_EN = $val;
}
function setInscricaoBool13_EN($val) {
	$this->inscricaoBool13_EN = $val;
}
function setInscricaoBool14_EN($val) {
	$this->inscricaoBool14_EN = $val;
}
function setInscricaoBool15_EN($val) {
	$this->inscricaoBool15_EN = $val;
}
function setInscricaoBool16_EN($val) {
	$this->inscricaoBool16_EN = $val;
}
function setInscricaoBool17_EN($val) {
	$this->inscricaoBool17_EN = $val;
}
function setInscricaoBool18_EN($val) {
	$this->inscricaoBool18_EN = $val;
}
function setInscricaoBool19_EN($val) {
	$this->inscricaoBool19_EN = $val;
}
function setInscricaoBool20_EN($val) {
	$this->inscricaoBool20_EN = $val;
}
function setInscricaoBool1_ES($val) {
	$this->inscricaoBool1_ES = $val;
}
function setInscricaoBool2_ES($val) {
	$this->inscricaoBool2_ES = $val;
}
function setInscricaoBool3_ES($val) {
	$this->inscricaoBool3_ES = $val;
}
function setInscricaoBool4_ES($val) {
	$this->inscricaoBool4_ES = $val;
}
function setInscricaoBool5_ES($val) {
	$this->inscricaoBool5_ES = $val;
}
function setInscricaoBool6_ES($val) {
	$this->inscricaoBool6_ES = $val;
}
function setInscricaoBool7_ES($val) {
	$this->inscricaoBool7_ES = $val;
}
function setInscricaoBool8_ES($val) {
	$this->inscricaoBool8_ES = $val;
}
function setInscricaoBool9_ES($val) {
	$this->inscricaoBool9_ES = $val;
}
function setInscricaoBool10_ES($val) {
	$this->inscricaoBool10_ES = $val;
}
function setInscricaoBool11_ES($val) {
	$this->inscricaoBool11_ES = $val;
}
function setInscricaoBool12_ES($val) {
	$this->inscricaoBool12_ES = $val;
}
function setInscricaoBool13_ES($val) {
	$this->inscricaoBool13_ES = $val;
}
function setInscricaoBool14_ES($val) {
	$this->inscricaoBool14_ES = $val;
}
function setInscricaoBool15_ES($val) {
	$this->inscricaoBool15_ES = $val;
}
function setInscricaoBool16_ES($val) {
	$this->inscricaoBool16_ES = $val;
}
function setInscricaoBool17_ES($val) {
	$this->inscricaoBool17_ES = $val;
}
function setInscricaoBool18_ES($val) {
	$this->inscricaoBool18_ES = $val;
}
function setInscricaoBool19_ES($val) {
	$this->inscricaoBool19_ES = $val;
}
function setInscricaoBool20_ES($val) {
	$this->inscricaoBool20_ES = $val;
}
function setInscricaoCurso1_PT($val) {
	$this->inscricaoCurso1_PT = $val;
}
function setInscricaoCurso2_PT($val) {
	$this->inscricaoCurso2_PT = $val;
}
function setInscricaoCurso3_PT($val) {
	$this->inscricaoCurso3_PT = $val;
}
function setInscricaoCurso4_PT($val) {
	$this->inscricaoCurso4_PT = $val;
}
function setInscricaoCurso5_PT($val) {
	$this->inscricaoCurso5_PT = $val;
}
function setInscricaoCurso6_PT($val) {
	$this->inscricaoCurso6_PT = $val;
}
function setInscricaoCurso7_PT($val) {
	$this->inscricaoCurso7_PT = $val;
}
function setInscricaoCurso8_PT($val) {
	$this->inscricaoCurso8_PT = $val;
}
function setInscricaoCurso9_PT($val) {
	$this->inscricaoCurso9_PT = $val;
}
function setInscricaoCurso10_PT($val) {
	$this->inscricaoCurso10_PT = $val;
}
function setInscricaoCurso11_PT($val) {
	$this->inscricaoCurso11_PT = $val;
}
function setInscricaoCurso12_PT($val) {
	$this->inscricaoCurso12_PT = $val;
}
function setInscricaoCurso13_PT($val) {
	$this->inscricaoCurso13_PT = $val;
}
function setInscricaoCurso14_PT($val) {
	$this->inscricaoCurso14_PT = $val;
}
function setInscricaoCurso15_PT($val) {
	$this->inscricaoCurso15_PT = $val;
}
function setInscricaoCurso16_PT($val) {
	$this->inscricaoCurso16_PT = $val;
}
function setInscricaoCurso17_PT($val) {
	$this->inscricaoCurso17_PT = $val;
}
function setInscricaoCurso18_PT($val) {
	$this->inscricaoCurso18_PT = $val;
}
function setInscricaoCurso19_PT($val) {
	$this->inscricaoCurso19_PT = $val;
}
function setInscricaoCurso20_PT($val) {
	$this->inscricaoCurso20_PT = $val;
}
function setInscricaoCurso21_PT($val) {
	$this->inscricaoCurso21_PT = $val;
}
function setInscricaoCurso22_PT($val) {
	$this->inscricaoCurso22_PT = $val;
}
function setInscricaoCurso23_PT($val) {
	$this->inscricaoCurso23_PT = $val;
}
function setInscricaoCurso24_PT($val) {
	$this->inscricaoCurso24_PT = $val;
}
function setInscricaoCurso25_PT($val) {
	$this->inscricaoCurso25_PT = $val;
}
function setInscricaoCurso26_PT($val) {
	$this->inscricaoCurso26_PT = $val;
}
function setInscricaoCurso27_PT($val) {
	$this->inscricaoCurso27_PT = $val;
}
function setInscricaoCurso28_PT($val) {
	$this->inscricaoCurso28_PT = $val;
}
function setInscricaoCurso29_PT($val) {
	$this->inscricaoCurso29_PT = $val;
}
function setInscricaoCurso30_PT($val) {
	$this->inscricaoCurso30_PT = $val;
}
function setInscricaoCurso1_EN($val) {
	$this->inscricaoCurso1_EN = $val;
}
function setInscricaoCurso2_EN($val) {
	$this->inscricaoCurso2_EN = $val;
}
function setInscricaoCurso3_EN($val) {
	$this->inscricaoCurso3_EN = $val;
}
function setInscricaoCurso4_EN($val) {
	$this->inscricaoCurso4_EN = $val;
}
function setInscricaoCurso5_EN($val) {
	$this->inscricaoCurso5_EN = $val;
}
function setInscricaoCurso6_EN($val) {
	$this->inscricaoCurso6_EN = $val;
}
function setInscricaoCurso7_EN($val) {
	$this->inscricaoCurso7_EN = $val;
}
function setInscricaoCurso8_EN($val) {
	$this->inscricaoCurso8_EN = $val;
}
function setInscricaoCurso9_EN($val) {
	$this->inscricaoCurso9_EN = $val;
}
function setInscricaoCurso10_EN($val) {
	$this->inscricaoCurso10_EN = $val;
}
function setInscricaoCurso11_EN($val) {
	$this->inscricaoCurso11_EN = $val;
}
function setInscricaoCurso12_EN($val) {
	$this->inscricaoCurso12_EN = $val;
}
function setInscricaoCurso13_EN($val) {
	$this->inscricaoCurso13_EN = $val;
}
function setInscricaoCurso14_EN($val) {
	$this->inscricaoCurso14_EN = $val;
}
function setInscricaoCurso15_EN($val) {
	$this->inscricaoCurso15_EN = $val;
}
function setInscricaoCurso16_EN($val) {
	$this->inscricaoCurso16_EN = $val;
}
function setInscricaoCurso17_EN($val) {
	$this->inscricaoCurso17_EN = $val;
}
function setInscricaoCurso18_EN($val) {
	$this->inscricaoCurso18_EN = $val;
}
function setInscricaoCurso19_EN($val) {
	$this->inscricaoCurso19_EN = $val;
}
function setInscricaoCurso20_EN($val) {
	$this->inscricaoCurso20_EN = $val;
}
function setInscricaoCurso21_EN($val) {
	$this->inscricaoCurso21_EN = $val;
}
function setInscricaoCurso22_EN($val) {
	$this->inscricaoCurso22_EN = $val;
}
function setInscricaoCurso23_EN($val) {
	$this->inscricaoCurso23_EN = $val;
}
function setInscricaoCurso24_EN($val) {
	$this->inscricaoCurso24_EN = $val;
}
function setInscricaoCurso25_EN($val) {
	$this->inscricaoCurso25_EN = $val;
}
function setInscricaoCurso26_EN($val) {
	$this->inscricaoCurso26_EN = $val;
}
function setInscricaoCurso27_EN($val) {
	$this->inscricaoCurso27_EN = $val;
}
function setInscricaoCurso28_EN($val) {
	$this->inscricaoCurso28_EN = $val;
}
function setInscricaoCurso29_EN($val) {
	$this->inscricaoCurso29_EN = $val;
}
function setInscricaoCurso30_EN($val) {
	$this->inscricaoCurso30_EN = $val;
}
function setInscricaoCurso1_ES($val) {
	$this->inscricaoCurso1_ES = $val;
}
function setInscricaoCurso2_ES($val) {
	$this->inscricaoCurso2_ES = $val;
}
function setInscricaoCurso3_ES($val) {
	$this->inscricaoCurso3_ES = $val;
}
function setInscricaoCurso4_ES($val) {
	$this->inscricaoCurso4_ES = $val;
}
function setInscricaoCurso5_ES($val) {
	$this->inscricaoCurso5_ES = $val;
}
function setInscricaoCurso6_ES($val) {
	$this->inscricaoCurso6_ES = $val;
}
function setInscricaoCurso7_ES($val) {
	$this->inscricaoCurso7_ES = $val;
}
function setInscricaoCurso8_ES($val) {
	$this->inscricaoCurso8_ES = $val;
}
function setInscricaoCurso9_ES($val) {
	$this->inscricaoCurso9_ES = $val;
}
function setInscricaoCurso10_ES($val) {
	$this->inscricaoCurso10_ES = $val;
}
function setInscricaoCurso11_ES($val) {
	$this->inscricaoCurso11_ES = $val;
}
function setInscricaoCurso12_ES($val) {
	$this->inscricaoCurso12_ES = $val;
}
function setInscricaoCurso13_ES($val) {
	$this->inscricaoCurso13_ES = $val;
}
function setInscricaoCurso14_ES($val) {
	$this->inscricaoCurso14_ES = $val;
}
function setInscricaoCurso15_ES($val) {
	$this->inscricaoCurso15_ES = $val;
}
function setInscricaoCurso16_ES($val) {
	$this->inscricaoCurso16_ES = $val;
}
function setInscricaoCurso17_ES($val) {
	$this->inscricaoCurso17_ES = $val;
}
function setInscricaoCurso18_ES($val) {
	$this->inscricaoCurso18_ES = $val;
}
function setInscricaoCurso19_ES($val) {
	$this->inscricaoCurso19_ES = $val;
}
function setInscricaoCurso20_ES($val) {
	$this->inscricaoCurso20_ES = $val;
}
function setInscricaoCurso21_ES($val) {
	$this->inscricaoCurso21_ES = $val;
}
function setInscricaoCurso22_ES($val) {
	$this->inscricaoCurso22_ES = $val;
}
function setInscricaoCurso23_ES($val) {
	$this->inscricaoCurso23_ES = $val;
}
function setInscricaoCurso24_ES($val) {
	$this->inscricaoCurso24_ES = $val;
}
function setInscricaoCurso25_ES($val) {
	$this->inscricaoCurso25_ES = $val;
}
function setInscricaoCurso26_ES($val) {
	$this->inscricaoCurso26_ES = $val;
}
function setInscricaoCurso27_ES($val) {
	$this->inscricaoCurso27_ES = $val;
}
function setInscricaoCurso28_ES($val) {
	$this->inscricaoCurso28_ES = $val;
}
function setInscricaoCurso29_ES($val) {
	$this->inscricaoCurso29_ES = $val;
}
function setInscricaoCurso30_ES($val) {
	$this->inscricaoCurso30_ES = $val;
}
function setInscricaoCurso1Preco($val) {
	$this->inscricaoCurso1Preco = $val;
}
function setInscricaoCurso2Preco($val) {
	$this->inscricaoCurso2Preco = $val;
}
function setInscricaoCurso3Preco($val) {
	$this->inscricaoCurso3Preco = $val;
}
function setInscricaoCurso4Preco($val) {
	$this->inscricaoCurso4Preco = $val;
}
function setInscricaoCurso5Preco($val) {
	$this->inscricaoCurso5Preco = $val;
}
function setInscricaoCurso6Preco($val) {
	$this->inscricaoCurso6Preco = $val;
}
function setInscricaoCurso7Preco($val) {
	$this->inscricaoCurso7Preco = $val;
}
function setInscricaoCurso8Preco($val) {
	$this->inscricaoCurso8Preco = $val;
}
function setInscricaoCurso9Preco($val) {
	$this->inscricaoCurso9Preco = $val;
}
function setInscricaoCurso10Preco($val) {
	$this->inscricaoCurso10Preco = $val;
}
function setInscricaoCurso11Preco($val) {
	$this->inscricaoCurso11Preco = $val;
}
function setInscricaoCurso12Preco($val) {
	$this->inscricaoCurso12Preco = $val;
}
function setInscricaoCurso13Preco($val) {
	$this->inscricaoCurso13Preco = $val;
}
function setInscricaoCurso14Preco($val) {
	$this->inscricaoCurso14Preco = $val;
}
function setInscricaoCurso15Preco($val) {
	$this->inscricaoCurso15Preco = $val;
}
function setInscricaoCurso16Preco($val) {
	$this->inscricaoCurso16Preco = $val;
}
function setInscricaoCurso17Preco($val) {
	$this->inscricaoCurso17Preco = $val;
}
function setInscricaoCurso18Preco($val) {
	$this->inscricaoCurso18Preco = $val;
}
function setInscricaoCurso19Preco($val) {
	$this->inscricaoCurso19Preco = $val;
}
function setInscricaoCurso20Preco($val) {
	$this->inscricaoCurso20Preco = $val;
}
function setInscricaoCurso21Preco($val) {
	$this->inscricaoCurso21Preco = $val;
}
function setInscricaoCurso22Preco($val) {
	$this->inscricaoCurso22Preco = $val;
}
function setInscricaoCurso23Preco($val) {
	$this->inscricaoCurso23Preco = $val;
}
function setInscricaoCurso24Preco($val) {
	$this->inscricaoCurso24Preco = $val;
}
function setInscricaoCurso25Preco($val) {
	$this->inscricaoCurso25Preco = $val;
}
function setInscricaoCurso26Preco($val) {
	$this->inscricaoCurso26Preco = $val;
}
function setInscricaoCurso27Preco($val) {
	$this->inscricaoCurso27Preco = $val;
}
function setInscricaoCurso28Preco($val) {
	$this->inscricaoCurso28Preco = $val;
}
function setInscricaoCurso29Preco($val) {
	$this->inscricaoCurso29Preco = $val;
}
function setInscricaoCurso30Preco($val) {
	$this->inscricaoCurso30Preco = $val;
}
function setInscricaoDadosDepositoPT($val) {
	$this->inscricaoDadosDepositoPT = $val;
}
function setInscricaoDadosDepositoEN($val) {
	$this->inscricaoDadosDepositoEN = $val;
}
function setInscricaoDadosDepositoES($val) {
	$this->inscricaoDadosDepositoES = $val;
}
function setInscricaoTelaSubmissaoPT($val) {
	$this->inscricaoTelaSubmissaoPT = $val;
}
function setInscricaoTelaSubmissaoEN($val) {
	$this->inscricaoTelaSubmissaoEN = $val;
}
function setInscricaoTelaSubmissaoES($val) {
	$this->inscricaoTelaSubmissaoES = $val;
}
function setInscricaoTelaSubmissaoDepositoPT($val) {
	$this->inscricaoTelaSubmissaoDepositoPT = $val;
}
function setInscricaoTelaSubmissaoDepositoEN($val) {
	$this->inscricaoTelaSubmissaoDepositoEN = $val;
}
function setInscricaoTelaSubmissaoDepositoES($val) {
	$this->inscricaoTelaSubmissaoDepositoES = $val;
}
function setInscricaoEmailSubmissaoPT($val) {
	$this->inscricaoEmailSubmissaoPT = $val;
}
function setInscricaoEmailSubmissaoEN($val) {
	$this->inscricaoEmailSubmissaoEN = $val;
}
function setInscricaoEmailSubmissaoES($val) {
	$this->inscricaoEmailSubmissaoES = $val;
}
function setTrabalhoAvaliacaoDescricaoPT($val) {
	$this->trabalhoAvaliacaoDescricaoPT = $val;
}
function setTrabalhoAvaliacaoDescricaoEN($val) {
	$this->trabalhoAvaliacaoDescricaoEN = $val;
}
function setTrabalhoAvaliacaoDescricaoES($val) {
	$this->trabalhoAvaliacaoDescricaoES = $val;
}
function setTrabalhoAvaliacaoNotaADescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaADescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaADescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaADescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaADescricaoES($val) {
	$this->trabalhoAvaliacaoNotaADescricaoES = $val;
}
function setTrabalhoAvaliacaoNotaBDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaBDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaBDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaBDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaBDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaBDescricaoES = $val;
}
function setTrabalhoAvaliacaoNotaCDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaCDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaCDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaCDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaCDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaCDescricaoES = $val;
}
function setTrabalhoAvaliacaoNotaDDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaDDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaDDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaDDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaDDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaDDescricaoES = $val;
}
function setTrabalhoAvaliacaoNotaEDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaEDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaEDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaEDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaEDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaEDescricaoES = $val;
}

function setTrabalhoAvaliacaoNotaFDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaFDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaFDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaFDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaFDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaFDescricaoES = $val;
}

function setTrabalhoAvaliacaoNotaGDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaGDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaGDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaGDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaGDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaGDescricaoES = $val;
}

function setTrabalhoAvaliacaoNotaHDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaHDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaHDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaHDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaHDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaHDescricaoES = $val;
}

function setTrabalhoAvaliacaoNotaIDescricaoPT($val) {
	$this->trabalhoAvaliacaoNotaIDescricaoPT = $val;
}
function setTrabalhoAvaliacaoNotaIDescricaoEN($val) {
	$this->trabalhoAvaliacaoNotaIDescricaoEN = $val;
}
function setTrabalhoAvaliacaoNotaIDescricaoES($val) {
	$this->trabalhoAvaliacaoNotaIDescricaoES = $val;
}

function setTrabalhoAvaliacaoNotaAMax($val) {
	$this->trabalhoAvaliacaoNotaAMax = $val;
}
function setTrabalhoAvaliacaoNotaBMax($val) {
	$this->trabalhoAvaliacaoNotaBMax = $val;
}
function setTrabalhoAvaliacaoNotaCMax($val) {
	$this->trabalhoAvaliacaoNotaCMax = $val;
}
function setTrabalhoAvaliacaoNotaDMax($val) {
	$this->trabalhoAvaliacaoNotaDMax = $val;
}
function setTrabalhoAvaliacaoNotaEMax($val) {
	$this->trabalhoAvaliacaoNotaEMax = $val;
}

function setTrabalhoAvaliacaoNotaFMax($val) {
	$this->trabalhoAvaliacaoNotaFMax = $val;
}
function setTrabalhoAvaliacaoNotaGMax($val) {
	$this->trabalhoAvaliacaoNotaGMax = $val;
}
function setTrabalhoAvaliacaoNotaHMax($val) {
	$this->trabalhoAvaliacaoNotaHMax = $val;
}
function setTrabalhoAvaliacaoNotaIMax($val) {
	$this->trabalhoAvaliacaoNotaIMax = $val;
}

function setTrabalhoArea1PT($val) {
	$this->trabalhoArea1PT = $val;
}
function setTrabalhoArea2PT($val) {
	$this->trabalhoArea2PT = $val;
}
function setTrabalhoArea3PT($val) {
	$this->trabalhoArea3PT = $val;
}
function setTrabalhoArea4PT($val) {
	$this->trabalhoArea4PT = $val;
}
function setTrabalhoArea5PT($val) {
	$this->trabalhoArea5PT = $val;
}
function setTrabalhoArea6PT($val) {
	$this->trabalhoArea6PT = $val;
}
function setTrabalhoArea7PT($val) {
	$this->trabalhoArea7PT = $val;
}
function setTrabalhoArea8PT($val) {
	$this->trabalhoArea8PT = $val;
}
function setTrabalhoArea9PT($val) {
	$this->trabalhoArea9PT = $val;
}
function setTrabalhoArea10PT($val) {
	$this->trabalhoArea10PT = $val;
}
function setTrabalhoArea11PT($val) {
	$this->trabalhoArea11PT = $val;
}
function setTrabalhoArea12PT($val) {
	$this->trabalhoArea12PT = $val;
}
function setTrabalhoArea13PT($val) {
	$this->trabalhoArea13PT = $val;
}
function setTrabalhoArea14PT($val) {
	$this->trabalhoArea14PT = $val;
}
function setTrabalhoArea15PT($val) {
	$this->trabalhoArea15PT = $val;
}
function setTrabalhoArea16PT($val) {
	$this->trabalhoArea16PT = $val;
}
function setTrabalhoArea17PT($val) {
	$this->trabalhoArea17PT = $val;
}
function setTrabalhoArea18PT($val) {
	$this->trabalhoArea18PT = $val;
}
function setTrabalhoArea19PT($val) {
	$this->trabalhoArea19PT = $val;
}
function setTrabalhoArea20PT($val) {
	$this->trabalhoArea20PT = $val;
}
function setTrabalhoArea1EN($val) {
	$this->trabalhoArea1EN = $val;
}
function setTrabalhoArea2EN($val) {
	$this->trabalhoArea2EN = $val;
}
function setTrabalhoArea3EN($val) {
	$this->trabalhoArea3EN = $val;
}
function setTrabalhoArea4EN($val) {
	$this->trabalhoArea4EN = $val;
}
function setTrabalhoArea5EN($val) {
	$this->trabalhoArea5EN = $val;
}
function setTrabalhoArea6EN($val) {
	$this->trabalhoArea6EN = $val;
}
function setTrabalhoArea7EN($val) {
	$this->trabalhoArea7EN = $val;
}
function setTrabalhoArea8EN($val) {
	$this->trabalhoArea8EN = $val;
}
function setTrabalhoArea9EN($val) {
	$this->trabalhoArea9EN = $val;
}
function setTrabalhoArea10EN($val) {
	$this->trabalhoArea10EN = $val;
}
function setTrabalhoArea11EN($val) {
	$this->trabalhoArea11EN = $val;
}
function setTrabalhoArea12EN($val) {
	$this->trabalhoArea12EN = $val;
}
function setTrabalhoArea13EN($val) {
	$this->trabalhoArea13EN = $val;
}
function setTrabalhoArea14EN($val) {
	$this->trabalhoArea14EN = $val;
}
function setTrabalhoArea15EN($val) {
	$this->trabalhoArea15EN = $val;
}
function setTrabalhoArea16EN($val) {
	$this->trabalhoArea16EN = $val;
}
function setTrabalhoArea17EN($val) {
	$this->trabalhoArea17EN = $val;
}
function setTrabalhoArea18EN($val) {
	$this->trabalhoArea18EN = $val;
}
function setTrabalhoArea19EN($val) {
	$this->trabalhoArea19EN = $val;
}
function setTrabalhoArea20EN($val) {
	$this->trabalhoArea20EN = $val;
}
function setTrabalhoArea1ES($val) {
	$this->trabalhoArea1ES = $val;
}
function setTrabalhoArea2ES($val) {
	$this->trabalhoArea2ES = $val;
}
function setTrabalhoArea3ES($val) {
	$this->trabalhoArea3ES = $val;
}
function setTrabalhoArea4ES($val) {
	$this->trabalhoArea4ES = $val;
}
function setTrabalhoArea5ES($val) {
	$this->trabalhoArea5ES = $val;
}
function setTrabalhoArea6ES($val) {
	$this->trabalhoArea6ES = $val;
}
function setTrabalhoArea7ES($val) {
	$this->trabalhoArea7ES = $val;
}
function setTrabalhoArea8ES($val) {
	$this->trabalhoArea8ES = $val;
}
function setTrabalhoArea9ES($val) {
	$this->trabalhoArea9ES = $val;
}
function setTrabalhoArea10ES($val) {
	$this->trabalhoArea10ES = $val;
}
function setTrabalhoArea11ES($val) {
	$this->trabalhoArea11ES = $val;
}
function setTrabalhoArea12ES($val) {
	$this->trabalhoArea12ES = $val;
}
function setTrabalhoArea13ES($val) {
	$this->trabalhoArea13ES = $val;
}
function setTrabalhoArea14ES($val) {
	$this->trabalhoArea14ES = $val;
}
function setTrabalhoArea15ES($val) {
	$this->trabalhoArea15ES = $val;
}
function setTrabalhoArea16ES($val) {
	$this->trabalhoArea16ES = $val;
}
function setTrabalhoArea17ES($val) {
	$this->trabalhoArea17ES = $val;
}
function setTrabalhoArea18ES($val) {
	$this->trabalhoArea18ES = $val;
}
function setTrabalhoArea19ES($val) {
	$this->trabalhoArea19ES = $val;
}
function setTrabalhoArea20ES($val) {
	$this->trabalhoArea20ES = $val;
}
function setTrabalhoEmailAvaliadorConvitePT($val) {
	$this->trabalhoEmailAvaliadorConvitePT = $val;
}
function setTrabalhoEmailAvaliadorConviteEN($val) {
	$this->trabalhoEmailAvaliadorConviteEN = $val;
}
function setTrabalhoEmailAvaliadorConviteES($val) {
	$this->trabalhoEmailAvaliadorConviteES = $val;
}
function setTrabalhoEmailSubmissaoPT($val) {
	$this->trabalhoEmailSubmissaoPT = $val;
}
function setTrabalhoEmailSubmissaoEN($val) {
	$this->trabalhoEmailSubmissaoEN = $val;
}
function setTrabalhoEmailSubmissaoES($val) {
	$this->trabalhoEmailSubmissaoES = $val;
}
function setTrabalhoEmailAceitoPT($val) {
	$this->trabalhoEmailAceitoPT = $val;
}
function setTrabalhoEmailAceitoEN($val) {
	$this->trabalhoEmailAceitoEN = $val;
}
function setTrabalhoEmailAceitoES($val) {
	$this->trabalhoEmailAceitoES = $val;
}
function setTrabalhoEmailAceitoComRestricoesPT($val) {
	$this->trabalhoEmailAceitoComRestricoesPT = $val;
}
function setTrabalhoEmailAceitoComRestricoesEN($val) {
	$this->trabalhoEmailAceitoComRestricoesEN = $val;
}
function setTrabalhoEmailAceitoComRestricoesES($val) {
	$this->trabalhoEmailAceitoComRestricoesES = $val;
}
function setTrabalhoEmailRejeitadoPT($val) {
	$this->trabalhoEmailRejeitadoPT = $val;
}
function setTrabalhoEmailRejeitadoEN($val) {
	$this->trabalhoEmailRejeitadoEN = $val;
}
function setTrabalhoEmailRejeitadoES($val) {
	$this->trabalhoEmailRejeitadoES = $val;
}
function setTrabalhoTelaSubmissaoPT($val) {
	$this->trabalhoTelaSubmissaoPT = $val;
}
function setTrabalhoTelaSubmissaoEN($val) {
	$this->trabalhoTelaSubmissaoEN = $val;
}
function setTrabalhoTelaSubmissaoES($val) {
	$this->trabalhoTelaSubmissaoES = $val;
}
function setTrabalhoTelaSubmissaoOkPT($val) {
	$this->trabalhoTelaSubmissaoOkPT = $val;
}
function setTrabalhoTelaSubmissaoOkEN($val) {
	$this->trabalhoTelaSubmissaoOkEN = $val;
}
function setTrabalhoTelaSubmissaoOkES($val) {
	$this->trabalhoTelaSubmissaoOkES = $val;
}

/**
 * Método que inicializa as variáveis do arquivo XML do respectivo evento
 */
function loadFromFile($file) {
  $doc = new DOMDocument("1.0","iso-8859-1");
  $doc->load($file);
  $this->eventoAlias = utf8_decode($doc->getElementsByTagName("eventoAlias")->item(0)->nodeValue);
  $this->emailInscricao = utf8_decode($doc->getElementsByTagName("emailInscricao")->item(0)->nodeValue);
  $this->emailTrabalho = utf8_decode($doc->getElementsByTagName("emailTrabalho")->item(0)->nodeValue);
  $this->inscricaoCategoriaA_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaA_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaB_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaB_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaC_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaC_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaD_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaD_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaE_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaE_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaF_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaF_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaG_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaG_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaH_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaH_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaI_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaI_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaJ_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaJ_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaK_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaK_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaL_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaL_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaM_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaM_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaN_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaN_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaO_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaO_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaP_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaP_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaQ_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaQ_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaR_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaR_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaS_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaS_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaT_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaT_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaU_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaU_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaV_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaV_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaW_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaW_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaX_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaX_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaY_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaY_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaZ_PT = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaZ_PT")->item(0)->nodeValue);
  $this->inscricaoCategoriaA_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaA_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaB_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaB_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaC_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaC_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaD_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaD_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaE_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaE_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaF_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaF_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaG_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaG_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaH_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaH_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaI_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaI_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaJ_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaJ_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaK_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaK_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaL_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaL_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaM_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaM_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaN_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaN_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaO_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaO_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaP_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaP_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaQ_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaQ_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaR_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaR_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaS_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaS_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaT_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaT_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaU_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaU_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaV_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaV_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaW_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaW_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaX_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaX_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaY_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaY_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaZ_EN = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaZ_EN")->item(0)->nodeValue);
  $this->inscricaoCategoriaA_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaA_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaB_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaB_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaC_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaC_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaD_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaD_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaE_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaE_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaF_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaF_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaG_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaG_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaH_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaH_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaI_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaI_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaJ_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaJ_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaK_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaK_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaL_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaL_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaM_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaM_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaN_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaN_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaO_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaO_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaP_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaP_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaQ_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaQ_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaR_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaR_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaS_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaS_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaT_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaT_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaU_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaU_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaV_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaV_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaW_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaW_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaX_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaX_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaY_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaY_ES")->item(0)->nodeValue);
  $this->inscricaoCategoriaZ_ES = utf8_decode($doc->getElementsByTagName("inscricaoCategoriaZ_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao1_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao1_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao2_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao2_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao3_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao3_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao4_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao4_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao5_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao5_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao6_PT = utf8_decode($doc->getElementsByTagName("inscricaoOpcao6_PT")->item(0)->nodeValue);
  $this->inscricaoOpcao1_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao1_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao2_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao2_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao3_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao3_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao4_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao4_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao5_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao5_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao6_EN = utf8_decode($doc->getElementsByTagName("inscricaoOpcao6_EN")->item(0)->nodeValue);
  $this->inscricaoOpcao1_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao1_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao2_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao2_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao3_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao3_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao4_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao4_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao5_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao5_ES")->item(0)->nodeValue);
  $this->inscricaoOpcao6_ES = utf8_decode($doc->getElementsByTagName("inscricaoOpcao6_ES")->item(0)->nodeValue);
  $this->inscricaoTexto1_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto1_PT")->item(0)->nodeValue);
  $this->inscricaoTexto2_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto2_PT")->item(0)->nodeValue);
  $this->inscricaoTexto3_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto3_PT")->item(0)->nodeValue);
  $this->inscricaoTexto4_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto4_PT")->item(0)->nodeValue);
  $this->inscricaoTexto5_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto5_PT")->item(0)->nodeValue);
  $this->inscricaoTexto6_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto6_PT")->item(0)->nodeValue);
  $this->inscricaoTexto7_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto7_PT")->item(0)->nodeValue);
  $this->inscricaoTexto8_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto8_PT")->item(0)->nodeValue);
  $this->inscricaoTexto9_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto9_PT")->item(0)->nodeValue);
  $this->inscricaoTexto10_PT = utf8_decode($doc->getElementsByTagName("inscricaoTexto10_PT")->item(0)->nodeValue);
  $this->inscricaoTexto1_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto1_EN")->item(0)->nodeValue);
  $this->inscricaoTexto2_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto2_EN")->item(0)->nodeValue);
  $this->inscricaoTexto3_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto3_EN")->item(0)->nodeValue);
  $this->inscricaoTexto4_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto4_EN")->item(0)->nodeValue);
  $this->inscricaoTexto5_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto5_EN")->item(0)->nodeValue);
  $this->inscricaoTexto6_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto6_EN")->item(0)->nodeValue);
  $this->inscricaoTexto7_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto7_EN")->item(0)->nodeValue);
  $this->inscricaoTexto8_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto8_EN")->item(0)->nodeValue);
  $this->inscricaoTexto9_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto9_EN")->item(0)->nodeValue);
  $this->inscricaoTexto10_EN = utf8_decode($doc->getElementsByTagName("inscricaoTexto10_EN")->item(0)->nodeValue);
  $this->inscricaoTexto1_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto1_ES")->item(0)->nodeValue);
  $this->inscricaoTexto2_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto2_ES")->item(0)->nodeValue);
  $this->inscricaoTexto3_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto3_ES")->item(0)->nodeValue);
  $this->inscricaoTexto4_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto4_ES")->item(0)->nodeValue);
  $this->inscricaoTexto5_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto5_ES")->item(0)->nodeValue);
  $this->inscricaoTexto6_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto6_ES")->item(0)->nodeValue);
  $this->inscricaoTexto7_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto7_ES")->item(0)->nodeValue);
  $this->inscricaoTexto8_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto8_ES")->item(0)->nodeValue);
  $this->inscricaoTexto9_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto9_ES")->item(0)->nodeValue);
  $this->inscricaoTexto10_ES = utf8_decode($doc->getElementsByTagName("inscricaoTexto10_ES")->item(0)->nodeValue);
  $this->inscricaoBool1_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool1_PT")->item(0)->nodeValue);
  $this->inscricaoBool2_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool2_PT")->item(0)->nodeValue);
  $this->inscricaoBool3_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool3_PT")->item(0)->nodeValue);
  $this->inscricaoBool4_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool4_PT")->item(0)->nodeValue);
  $this->inscricaoBool5_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool5_PT")->item(0)->nodeValue);
  $this->inscricaoBool6_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool6_PT")->item(0)->nodeValue);
  $this->inscricaoBool7_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool7_PT")->item(0)->nodeValue);
  $this->inscricaoBool8_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool8_PT")->item(0)->nodeValue);
  $this->inscricaoBool9_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool9_PT")->item(0)->nodeValue);
  $this->inscricaoBool10_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool10_PT")->item(0)->nodeValue);
  $this->inscricaoBool11_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool11_PT")->item(0)->nodeValue);
  $this->inscricaoBool12_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool12_PT")->item(0)->nodeValue);
  $this->inscricaoBool13_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool13_PT")->item(0)->nodeValue);
  $this->inscricaoBool14_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool14_PT")->item(0)->nodeValue);
  $this->inscricaoBool15_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool15_PT")->item(0)->nodeValue);
  $this->inscricaoBool16_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool16_PT")->item(0)->nodeValue);
  $this->inscricaoBool17_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool17_PT")->item(0)->nodeValue);
  $this->inscricaoBool18_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool18_PT")->item(0)->nodeValue);
  $this->inscricaoBool19_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool19_PT")->item(0)->nodeValue);
  $this->inscricaoBool20_PT = utf8_decode($doc->getElementsByTagName("inscricaoBool20_PT")->item(0)->nodeValue);
  $this->inscricaoBool1_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool1_EN")->item(0)->nodeValue);
  $this->inscricaoBool2_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool2_EN")->item(0)->nodeValue);
  $this->inscricaoBool3_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool3_EN")->item(0)->nodeValue);
  $this->inscricaoBool4_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool4_EN")->item(0)->nodeValue);
  $this->inscricaoBool5_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool5_EN")->item(0)->nodeValue);
  $this->inscricaoBool6_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool6_EN")->item(0)->nodeValue);
  $this->inscricaoBool7_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool7_EN")->item(0)->nodeValue);
  $this->inscricaoBool8_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool8_EN")->item(0)->nodeValue);
  $this->inscricaoBool9_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool9_EN")->item(0)->nodeValue);
  $this->inscricaoBool10_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool10_EN")->item(0)->nodeValue);
  $this->inscricaoBool11_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool11_EN")->item(0)->nodeValue);
  $this->inscricaoBool12_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool12_EN")->item(0)->nodeValue);
  $this->inscricaoBool13_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool13_EN")->item(0)->nodeValue);
  $this->inscricaoBool14_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool14_EN")->item(0)->nodeValue);
  $this->inscricaoBool15_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool15_EN")->item(0)->nodeValue);
  $this->inscricaoBool16_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool16_EN")->item(0)->nodeValue);
  $this->inscricaoBool17_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool17_EN")->item(0)->nodeValue);
  $this->inscricaoBool18_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool18_EN")->item(0)->nodeValue);
  $this->inscricaoBool19_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool19_EN")->item(0)->nodeValue);
  $this->inscricaoBool20_EN = utf8_decode($doc->getElementsByTagName("inscricaoBool20_EN")->item(0)->nodeValue);
  $this->inscricaoBool1_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool1_ES")->item(0)->nodeValue);
  $this->inscricaoBool2_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool2_ES")->item(0)->nodeValue);
  $this->inscricaoBool3_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool3_ES")->item(0)->nodeValue);
  $this->inscricaoBool4_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool4_ES")->item(0)->nodeValue);
  $this->inscricaoBool5_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool5_ES")->item(0)->nodeValue);
  $this->inscricaoBool6_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool6_ES")->item(0)->nodeValue);
  $this->inscricaoBool7_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool7_ES")->item(0)->nodeValue);
  $this->inscricaoBool8_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool8_ES")->item(0)->nodeValue);
  $this->inscricaoBool9_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool9_ES")->item(0)->nodeValue);
  $this->inscricaoBool10_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool10_ES")->item(0)->nodeValue);
  $this->inscricaoBool11_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool11_ES")->item(0)->nodeValue);
  $this->inscricaoBool12_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool12_ES")->item(0)->nodeValue);
  $this->inscricaoBool13_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool13_ES")->item(0)->nodeValue);
  $this->inscricaoBool14_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool14_ES")->item(0)->nodeValue);
  $this->inscricaoBool15_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool15_ES")->item(0)->nodeValue);
  $this->inscricaoBool16_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool16_ES")->item(0)->nodeValue);
  $this->inscricaoBool17_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool17_ES")->item(0)->nodeValue);
  $this->inscricaoBool18_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool18_ES")->item(0)->nodeValue);
  $this->inscricaoBool19_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool19_ES")->item(0)->nodeValue);
  $this->inscricaoBool20_ES = utf8_decode($doc->getElementsByTagName("inscricaoBool20_ES")->item(0)->nodeValue);
  $this->inscricaoCurso1_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso1_PT")->item(0)->nodeValue);
  $this->inscricaoCurso2_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso2_PT")->item(0)->nodeValue);
  $this->inscricaoCurso3_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso3_PT")->item(0)->nodeValue);
  $this->inscricaoCurso4_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso4_PT")->item(0)->nodeValue);
  $this->inscricaoCurso5_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso5_PT")->item(0)->nodeValue);
  $this->inscricaoCurso6_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso6_PT")->item(0)->nodeValue);
  $this->inscricaoCurso7_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso7_PT")->item(0)->nodeValue);
  $this->inscricaoCurso8_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso8_PT")->item(0)->nodeValue);
  $this->inscricaoCurso9_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso9_PT")->item(0)->nodeValue);
  $this->inscricaoCurso10_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso10_PT")->item(0)->nodeValue);
  $this->inscricaoCurso11_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso11_PT")->item(0)->nodeValue);
  $this->inscricaoCurso12_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso12_PT")->item(0)->nodeValue);
  $this->inscricaoCurso13_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso13_PT")->item(0)->nodeValue);
  $this->inscricaoCurso14_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso14_PT")->item(0)->nodeValue);
  $this->inscricaoCurso15_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso15_PT")->item(0)->nodeValue);
  $this->inscricaoCurso16_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso16_PT")->item(0)->nodeValue);
  $this->inscricaoCurso17_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso17_PT")->item(0)->nodeValue);
  $this->inscricaoCurso18_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso18_PT")->item(0)->nodeValue);
  $this->inscricaoCurso19_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso19_PT")->item(0)->nodeValue);
  $this->inscricaoCurso20_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso20_PT")->item(0)->nodeValue);
  $this->inscricaoCurso21_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso21_PT")->item(0)->nodeValue);
  $this->inscricaoCurso22_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso22_PT")->item(0)->nodeValue);
  $this->inscricaoCurso23_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso23_PT")->item(0)->nodeValue);
  $this->inscricaoCurso24_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso24_PT")->item(0)->nodeValue);
  $this->inscricaoCurso25_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso25_PT")->item(0)->nodeValue);
  $this->inscricaoCurso26_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso26_PT")->item(0)->nodeValue);
  $this->inscricaoCurso27_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso27_PT")->item(0)->nodeValue);
  $this->inscricaoCurso28_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso28_PT")->item(0)->nodeValue);
  $this->inscricaoCurso29_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso29_PT")->item(0)->nodeValue);
  $this->inscricaoCurso30_PT = utf8_decode($doc->getElementsByTagName("inscricaoCurso30_PT")->item(0)->nodeValue);
  $this->inscricaoCurso1_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso1_EN")->item(0)->nodeValue);
  $this->inscricaoCurso2_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso2_EN")->item(0)->nodeValue);
  $this->inscricaoCurso3_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso3_EN")->item(0)->nodeValue);
  $this->inscricaoCurso4_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso4_EN")->item(0)->nodeValue);
  $this->inscricaoCurso5_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso5_EN")->item(0)->nodeValue);
  $this->inscricaoCurso6_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso6_EN")->item(0)->nodeValue);
  $this->inscricaoCurso7_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso7_EN")->item(0)->nodeValue);
  $this->inscricaoCurso8_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso8_EN")->item(0)->nodeValue);
  $this->inscricaoCurso9_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso9_EN")->item(0)->nodeValue);
  $this->inscricaoCurso10_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso10_EN")->item(0)->nodeValue);
  $this->inscricaoCurso11_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso11_EN")->item(0)->nodeValue);
  $this->inscricaoCurso12_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso12_EN")->item(0)->nodeValue);
  $this->inscricaoCurso13_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso13_EN")->item(0)->nodeValue);
  $this->inscricaoCurso14_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso14_EN")->item(0)->nodeValue);
  $this->inscricaoCurso15_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso15_EN")->item(0)->nodeValue);
  $this->inscricaoCurso16_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso16_EN")->item(0)->nodeValue);
  $this->inscricaoCurso17_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso17_EN")->item(0)->nodeValue);
  $this->inscricaoCurso18_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso18_EN")->item(0)->nodeValue);
  $this->inscricaoCurso19_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso19_EN")->item(0)->nodeValue);
  $this->inscricaoCurso20_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso20_EN")->item(0)->nodeValue);
  $this->inscricaoCurso21_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso21_EN")->item(0)->nodeValue);
  $this->inscricaoCurso22_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso22_EN")->item(0)->nodeValue);
  $this->inscricaoCurso23_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso23_EN")->item(0)->nodeValue);
  $this->inscricaoCurso24_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso24_EN")->item(0)->nodeValue);
  $this->inscricaoCurso25_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso25_EN")->item(0)->nodeValue);
  $this->inscricaoCurso26_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso26_EN")->item(0)->nodeValue);
  $this->inscricaoCurso27_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso27_EN")->item(0)->nodeValue);
  $this->inscricaoCurso28_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso28_EN")->item(0)->nodeValue);
  $this->inscricaoCurso29_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso29_EN")->item(0)->nodeValue);
  $this->inscricaoCurso30_EN = utf8_decode($doc->getElementsByTagName("inscricaoCurso30_EN")->item(0)->nodeValue);
  $this->inscricaoCurso1_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso1_ES")->item(0)->nodeValue);
  $this->inscricaoCurso2_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso2_ES")->item(0)->nodeValue);
  $this->inscricaoCurso3_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso3_ES")->item(0)->nodeValue);
  $this->inscricaoCurso4_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso4_ES")->item(0)->nodeValue);
  $this->inscricaoCurso5_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso5_ES")->item(0)->nodeValue);
  $this->inscricaoCurso6_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso6_ES")->item(0)->nodeValue);
  $this->inscricaoCurso7_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso7_ES")->item(0)->nodeValue);
  $this->inscricaoCurso8_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso8_ES")->item(0)->nodeValue);
  $this->inscricaoCurso9_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso9_ES")->item(0)->nodeValue);
  $this->inscricaoCurso10_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso10_ES")->item(0)->nodeValue);
  $this->inscricaoCurso11_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso11_ES")->item(0)->nodeValue);
  $this->inscricaoCurso12_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso12_ES")->item(0)->nodeValue);
  $this->inscricaoCurso13_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso13_ES")->item(0)->nodeValue);
  $this->inscricaoCurso14_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso14_ES")->item(0)->nodeValue);
  $this->inscricaoCurso15_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso15_ES")->item(0)->nodeValue);
  $this->inscricaoCurso16_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso16_ES")->item(0)->nodeValue);
  $this->inscricaoCurso17_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso17_ES")->item(0)->nodeValue);
  $this->inscricaoCurso18_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso18_ES")->item(0)->nodeValue);
  $this->inscricaoCurso19_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso19_ES")->item(0)->nodeValue);
  $this->inscricaoCurso20_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso20_ES")->item(0)->nodeValue);
  $this->inscricaoCurso21_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso21_ES")->item(0)->nodeValue);
  $this->inscricaoCurso22_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso22_ES")->item(0)->nodeValue);
  $this->inscricaoCurso23_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso23_ES")->item(0)->nodeValue);
  $this->inscricaoCurso24_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso24_ES")->item(0)->nodeValue);
  $this->inscricaoCurso25_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso25_ES")->item(0)->nodeValue);
  $this->inscricaoCurso26_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso26_ES")->item(0)->nodeValue);
  $this->inscricaoCurso27_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso27_ES")->item(0)->nodeValue);
  $this->inscricaoCurso28_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso28_ES")->item(0)->nodeValue);
  $this->inscricaoCurso29_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso29_ES")->item(0)->nodeValue);
  $this->inscricaoCurso30_ES = utf8_decode($doc->getElementsByTagName("inscricaoCurso30_ES")->item(0)->nodeValue);
  $this->inscricaoCurso1Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso1Preco")->item(0)->nodeValue);
  $this->inscricaoCurso2Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso2Preco")->item(0)->nodeValue);
  $this->inscricaoCurso3Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso3Preco")->item(0)->nodeValue);
  $this->inscricaoCurso4Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso4Preco")->item(0)->nodeValue);
  $this->inscricaoCurso5Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso5Preco")->item(0)->nodeValue);
  $this->inscricaoCurso6Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso6Preco")->item(0)->nodeValue);
  $this->inscricaoCurso7Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso7Preco")->item(0)->nodeValue);
  $this->inscricaoCurso8Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso8Preco")->item(0)->nodeValue);
  $this->inscricaoCurso9Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso9Preco")->item(0)->nodeValue);
  $this->inscricaoCurso10Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso10Preco")->item(0)->nodeValue);
  $this->inscricaoCurso11Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso11Preco")->item(0)->nodeValue);
  $this->inscricaoCurso12Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso12Preco")->item(0)->nodeValue);
  $this->inscricaoCurso13Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso13Preco")->item(0)->nodeValue);
  $this->inscricaoCurso14Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso14Preco")->item(0)->nodeValue);
  $this->inscricaoCurso15Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso15Preco")->item(0)->nodeValue);
  $this->inscricaoCurso16Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso16Preco")->item(0)->nodeValue);
  $this->inscricaoCurso17Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso17Preco")->item(0)->nodeValue);
  $this->inscricaoCurso18Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso18Preco")->item(0)->nodeValue);
  $this->inscricaoCurso19Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso19Preco")->item(0)->nodeValue);
  $this->inscricaoCurso20Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso20Preco")->item(0)->nodeValue);
  $this->inscricaoCurso21Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso21Preco")->item(0)->nodeValue);
  $this->inscricaoCurso22Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso22Preco")->item(0)->nodeValue);
  $this->inscricaoCurso23Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso23Preco")->item(0)->nodeValue);
  $this->inscricaoCurso24Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso24Preco")->item(0)->nodeValue);
  $this->inscricaoCurso25Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso25Preco")->item(0)->nodeValue);
  $this->inscricaoCurso26Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso26Preco")->item(0)->nodeValue);
  $this->inscricaoCurso27Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso27Preco")->item(0)->nodeValue);
  $this->inscricaoCurso28Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso28Preco")->item(0)->nodeValue);
  $this->inscricaoCurso29Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso29Preco")->item(0)->nodeValue);
  $this->inscricaoCurso30Preco = utf8_decode($doc->getElementsByTagName("inscricaoCurso30Preco")->item(0)->nodeValue);
  $this->inscricaoDadosDepositoPT = utf8_decode($doc->getElementsByTagName("inscricaoDadosDepositoPT")->item(0)->nodeValue);
  $this->inscricaoDadosDepositoEN = utf8_decode($doc->getElementsByTagName("inscricaoDadosDepositoEN")->item(0)->nodeValue);
  $this->inscricaoDadosDepositoES = utf8_decode($doc->getElementsByTagName("inscricaoDadosDepositoES")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoPT = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoPT")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoEN = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoEN")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoES = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoES")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoDepositoPT = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoDepositoPT")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoDepositoEN = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoDepositoEN")->item(0)->nodeValue);
  $this->inscricaoTelaSubmissaoDepositoES = utf8_decode($doc->getElementsByTagName("inscricaoTelaSubmissaoDepositoES")->item(0)->nodeValue);
  $this->inscricaoEmailSubmissaoPT = utf8_decode($doc->getElementsByTagName("inscricaoEmailSubmissaoPT")->item(0)->nodeValue);
  $this->inscricaoEmailSubmissaoEN = utf8_decode($doc->getElementsByTagName("inscricaoEmailSubmissaoEN")->item(0)->nodeValue);
  $this->inscricaoEmailSubmissaoES = utf8_decode($doc->getElementsByTagName("inscricaoEmailSubmissaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoDescricaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaADescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaADescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaADescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaADescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaADescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaADescricaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaBDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaBDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaBDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaBDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaBDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaBDescricaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaCDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaCDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaCDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaCDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaCDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaCDescricaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaDDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaDDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaDDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaDDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaDDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaDDescricaoES")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaEDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaEDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaEDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaEDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaEDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaEDescricaoES")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaFDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaFDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaFDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaFDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaFDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaFDescricaoES")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaGDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaGDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaGDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaGDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaGDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaGDescricaoES")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaHDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaHDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaHDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaHDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaHDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaHDescricaoES")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaIDescricaoPT = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaIDescricaoPT")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaIDescricaoEN = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaIDescricaoEN")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaIDescricaoES = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaIDescricaoES")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaAMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaAMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaBMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaBMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaCMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaCMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaDMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaDMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaEMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaEMax")->item(0)->nodeValue);

  $this->trabalhoAvaliacaoNotaFMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaFMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaGMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaGMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaHMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaHMax")->item(0)->nodeValue);
  $this->trabalhoAvaliacaoNotaIMax = utf8_decode($doc->getElementsByTagName("trabalhoAvaliacaoNotaIMax")->item(0)->nodeValue);

  $this->trabalhoArea1PT = utf8_decode($doc->getElementsByTagName("trabalhoArea1PT")->item(0)->nodeValue);
  $this->trabalhoArea2PT = utf8_decode($doc->getElementsByTagName("trabalhoArea2PT")->item(0)->nodeValue);
  $this->trabalhoArea3PT = utf8_decode($doc->getElementsByTagName("trabalhoArea3PT")->item(0)->nodeValue);
  $this->trabalhoArea4PT = utf8_decode($doc->getElementsByTagName("trabalhoArea4PT")->item(0)->nodeValue);
  $this->trabalhoArea5PT = utf8_decode($doc->getElementsByTagName("trabalhoArea5PT")->item(0)->nodeValue);
  $this->trabalhoArea6PT = utf8_decode($doc->getElementsByTagName("trabalhoArea6PT")->item(0)->nodeValue);
  $this->trabalhoArea7PT = utf8_decode($doc->getElementsByTagName("trabalhoArea7PT")->item(0)->nodeValue);
  $this->trabalhoArea8PT = utf8_decode($doc->getElementsByTagName("trabalhoArea8PT")->item(0)->nodeValue);
  $this->trabalhoArea9PT = utf8_decode($doc->getElementsByTagName("trabalhoArea9PT")->item(0)->nodeValue);
  $this->trabalhoArea10PT = utf8_decode($doc->getElementsByTagName("trabalhoArea10PT")->item(0)->nodeValue);
  $this->trabalhoArea11PT = utf8_decode($doc->getElementsByTagName("trabalhoArea11PT")->item(0)->nodeValue);
  $this->trabalhoArea12PT = utf8_decode($doc->getElementsByTagName("trabalhoArea12PT")->item(0)->nodeValue);
  $this->trabalhoArea13PT = utf8_decode($doc->getElementsByTagName("trabalhoArea13PT")->item(0)->nodeValue);
  $this->trabalhoArea14PT = utf8_decode($doc->getElementsByTagName("trabalhoArea14PT")->item(0)->nodeValue);
  $this->trabalhoArea15PT = utf8_decode($doc->getElementsByTagName("trabalhoArea15PT")->item(0)->nodeValue);
  $this->trabalhoArea16PT = utf8_decode($doc->getElementsByTagName("trabalhoArea16PT")->item(0)->nodeValue);
  $this->trabalhoArea17PT = utf8_decode($doc->getElementsByTagName("trabalhoArea17PT")->item(0)->nodeValue);
  $this->trabalhoArea18PT = utf8_decode($doc->getElementsByTagName("trabalhoArea18PT")->item(0)->nodeValue);
  $this->trabalhoArea19PT = utf8_decode($doc->getElementsByTagName("trabalhoArea19PT")->item(0)->nodeValue);
  $this->trabalhoArea20PT = utf8_decode($doc->getElementsByTagName("trabalhoArea20PT")->item(0)->nodeValue);
  $this->trabalhoArea1EN = utf8_decode($doc->getElementsByTagName("trabalhoArea1EN")->item(0)->nodeValue);
  $this->trabalhoArea2EN = utf8_decode($doc->getElementsByTagName("trabalhoArea2EN")->item(0)->nodeValue);
  $this->trabalhoArea3EN = utf8_decode($doc->getElementsByTagName("trabalhoArea3EN")->item(0)->nodeValue);
  $this->trabalhoArea4EN = utf8_decode($doc->getElementsByTagName("trabalhoArea4EN")->item(0)->nodeValue);
  $this->trabalhoArea5EN = utf8_decode($doc->getElementsByTagName("trabalhoArea5EN")->item(0)->nodeValue);
  $this->trabalhoArea6EN = utf8_decode($doc->getElementsByTagName("trabalhoArea6EN")->item(0)->nodeValue);
  $this->trabalhoArea7EN = utf8_decode($doc->getElementsByTagName("trabalhoArea7EN")->item(0)->nodeValue);
  $this->trabalhoArea8EN = utf8_decode($doc->getElementsByTagName("trabalhoArea8EN")->item(0)->nodeValue);
  $this->trabalhoArea9EN = utf8_decode($doc->getElementsByTagName("trabalhoArea9EN")->item(0)->nodeValue);
  $this->trabalhoArea10EN = utf8_decode($doc->getElementsByTagName("trabalhoArea10EN")->item(0)->nodeValue);
  $this->trabalhoArea11EN = utf8_decode($doc->getElementsByTagName("trabalhoArea11EN")->item(0)->nodeValue);
  $this->trabalhoArea12EN = utf8_decode($doc->getElementsByTagName("trabalhoArea12EN")->item(0)->nodeValue);
  $this->trabalhoArea13EN = utf8_decode($doc->getElementsByTagName("trabalhoArea13EN")->item(0)->nodeValue);
  $this->trabalhoArea14EN = utf8_decode($doc->getElementsByTagName("trabalhoArea14EN")->item(0)->nodeValue);
  $this->trabalhoArea15EN = utf8_decode($doc->getElementsByTagName("trabalhoArea15EN")->item(0)->nodeValue);
  $this->trabalhoArea16EN = utf8_decode($doc->getElementsByTagName("trabalhoArea16EN")->item(0)->nodeValue);
  $this->trabalhoArea17EN = utf8_decode($doc->getElementsByTagName("trabalhoArea17EN")->item(0)->nodeValue);
  $this->trabalhoArea18EN = utf8_decode($doc->getElementsByTagName("trabalhoArea18EN")->item(0)->nodeValue);
  $this->trabalhoArea19EN = utf8_decode($doc->getElementsByTagName("trabalhoArea19EN")->item(0)->nodeValue);
  $this->trabalhoArea20EN = utf8_decode($doc->getElementsByTagName("trabalhoArea20EN")->item(0)->nodeValue);
  $this->trabalhoArea1ES = utf8_decode($doc->getElementsByTagName("trabalhoArea1ES")->item(0)->nodeValue);
  $this->trabalhoArea2ES = utf8_decode($doc->getElementsByTagName("trabalhoArea2ES")->item(0)->nodeValue);
  $this->trabalhoArea3ES = utf8_decode($doc->getElementsByTagName("trabalhoArea3ES")->item(0)->nodeValue);
  $this->trabalhoArea4ES = utf8_decode($doc->getElementsByTagName("trabalhoArea4ES")->item(0)->nodeValue);
  $this->trabalhoArea5ES = utf8_decode($doc->getElementsByTagName("trabalhoArea5ES")->item(0)->nodeValue);
  $this->trabalhoArea6ES = utf8_decode($doc->getElementsByTagName("trabalhoArea6ES")->item(0)->nodeValue);
  $this->trabalhoArea7ES = utf8_decode($doc->getElementsByTagName("trabalhoArea7ES")->item(0)->nodeValue);
  $this->trabalhoArea8ES = utf8_decode($doc->getElementsByTagName("trabalhoArea8ES")->item(0)->nodeValue);
  $this->trabalhoArea9ES = utf8_decode($doc->getElementsByTagName("trabalhoArea9ES")->item(0)->nodeValue);
  $this->trabalhoArea10ES = utf8_decode($doc->getElementsByTagName("trabalhoArea10ES")->item(0)->nodeValue);
  $this->trabalhoArea11ES = utf8_decode($doc->getElementsByTagName("trabalhoArea11ES")->item(0)->nodeValue);
  $this->trabalhoArea12ES = utf8_decode($doc->getElementsByTagName("trabalhoArea12ES")->item(0)->nodeValue);
  $this->trabalhoArea13ES = utf8_decode($doc->getElementsByTagName("trabalhoArea13ES")->item(0)->nodeValue);
  $this->trabalhoArea14ES = utf8_decode($doc->getElementsByTagName("trabalhoArea14ES")->item(0)->nodeValue);
  $this->trabalhoArea15ES = utf8_decode($doc->getElementsByTagName("trabalhoArea15ES")->item(0)->nodeValue);
  $this->trabalhoArea16ES = utf8_decode($doc->getElementsByTagName("trabalhoArea16ES")->item(0)->nodeValue);
  $this->trabalhoArea17ES = utf8_decode($doc->getElementsByTagName("trabalhoArea17ES")->item(0)->nodeValue);
  $this->trabalhoArea18ES = utf8_decode($doc->getElementsByTagName("trabalhoArea18ES")->item(0)->nodeValue);
  $this->trabalhoArea19ES = utf8_decode($doc->getElementsByTagName("trabalhoArea19ES")->item(0)->nodeValue);
  $this->trabalhoArea20ES = utf8_decode($doc->getElementsByTagName("trabalhoArea20ES")->item(0)->nodeValue);
  $this->trabalhoEmailAvaliadorConvitePT = utf8_decode($doc->getElementsByTagName("trabalhoEmailAvaliadorConvitePT")->item(0)->nodeValue);
  $this->trabalhoEmailAvaliadorConviteEN = utf8_decode($doc->getElementsByTagName("trabalhoEmailAvaliadorConviteEN")->item(0)->nodeValue);
  $this->trabalhoEmailAvaliadorConviteES = utf8_decode($doc->getElementsByTagName("trabalhoEmailAvaliadorConviteES")->item(0)->nodeValue);
  $this->trabalhoEmailSubmissaoPT = utf8_decode($doc->getElementsByTagName("trabalhoEmailSubmissaoPT")->item(0)->nodeValue);
  $this->trabalhoEmailSubmissaoEN = utf8_decode($doc->getElementsByTagName("trabalhoEmailSubmissaoEN")->item(0)->nodeValue);
  $this->trabalhoEmailSubmissaoES = utf8_decode($doc->getElementsByTagName("trabalhoEmailSubmissaoES")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoPT = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoPT")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoEN = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoEN")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoES = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoES")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoComRestricoesPT = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoComRestricoesPT")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoComRestricoesEN = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoComRestricoesEN")->item(0)->nodeValue);
  $this->trabalhoEmailAceitoComRestricoesES = utf8_decode($doc->getElementsByTagName("trabalhoEmailAceitoComRestricoesES")->item(0)->nodeValue);
  $this->trabalhoEmailRejeitadoPT = utf8_decode($doc->getElementsByTagName("trabalhoEmailRejeitadoPT")->item(0)->nodeValue);
  $this->trabalhoEmailRejeitadoEN = utf8_decode($doc->getElementsByTagName("trabalhoEmailRejeitadoEN")->item(0)->nodeValue);
  $this->trabalhoEmailRejeitadoES = utf8_decode($doc->getElementsByTagName("trabalhoEmailRejeitadoES")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoPT = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoPT")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoEN = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoEN")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoES = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoES")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoOkPT = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoOkPT")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoOkEN = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoOkEN")->item(0)->nodeValue);
  $this->trabalhoTelaSubmissaoOkES = utf8_decode($doc->getElementsByTagName("trabalhoTelaSubmissaoOkES")->item(0)->nodeValue);  
}


} // class : end

?>