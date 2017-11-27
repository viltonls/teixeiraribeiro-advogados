<?php include_once ( "class.avaliacao.php" ) ;
include_once ( "dto.avaliacao_trabalho.php" ) ;
include_once ( "dto.trabalho_qtd_avaliacao.php" ) ;
include_once ( "class.database.php" ) ;
// **********************
// CLASS DECLARATION
// **********************
class AvaliacaoService
{ // class : begin
	// **********************
	// ATTRIBUTE DECLARATION
	// **********************
	private $database ; // Instance of class database
	// **********************
	// CONSTRUCTOR METHOD
	// **********************
	function AvaliacaoService()
	{
		$this->database = new Database() ;
	}
	// **********************
	// SELECT METHOD / LOAD
	// **********************
	/**
	 * Carrega o valores pelo ID
	 *
	 * @param int $id
	 * @return Avaliacao
	 */
	function loadAvaliacaoFiltered( $aval_id, $trab_id, $status, $even_id )
	{
		$sql = " SELECT at.AVAL_ID AS AVAL_ID, " ;
		$sql .= " at.TRAB_ID AS TRAB_ID, " ;
		$sql .= " AVTR_DATA_ATRIBUIDO, " ;
		$sql .= " AVTR_DATA_AVALIADO, " ;
		$sql .= " AVTR_STATUS, " ;
		$sql .= " AVTR_COMENTARIO, " ;
		$sql .= " AVTR_NOTA_A, " ;
		$sql .= " AVTR_NOTA_B, " ;
		$sql .= " AVTR_NOTA_C, " ;
		$sql .= " AVTR_NOTA_D, " ;
		$sql .= " AVTR_NOTA_E, " ;
		$sql .= " AVTR_NOTA_F, " ;
		$sql .= " AVTR_NOTA_G, " ;
		$sql .= " AVTR_NOTA_H, " ;
		$sql .= " AVTR_NOTA_I" ;
		$sql .= " FROM avaliador_trabalho at, trabalho t " ;
		$sql .= " WHERE at.TRAB_ID = t.TRAB_ID AND t.EVEN_ID = $even_id" ;
		$sql .= " AND at.AVAL_ID = $aval_id " ;
		$sql .= " AND at.TRAB_ID = $trab_id " ;
		//echo $sql;break;
		if ( $status )
		{
			$sql .= " AND at.AVTR_STATUS = $status" ;
		}
		//echo $sql; break;
		$result = $this->database->query( $sql ) ;
		$result = $this->database->result ;
		//$row = mysql_fetch_object($result);
		$result_count = 0 ;
		while ( $row = mysql_fetch_object($result) )
		{
			$avaliacao = new Avaliacao() ;
			$avaliacao->setAVAL_ID( $row->AVAL_ID ) ;
			$avaliacao->setTRAB_ID( $row->TRAB_ID ) ;
			$avaliacao->setDATA_ATRIBUIDO( $row->AVTR_DATA_ATRIBUIDO ) ;
			$avaliacao->setDATA_AVALIADO( $row->AVTR_DATA_AVALIADO ) ;
			$avaliacao->setSTATUS( $row->AVTR_STATUS ) ;
			$avaliacao->setCOMENTARIO( $row->AVTR_COMENTARIO ) ;
			$avaliacao->setNOTA_A( $row->AVTR_NOTA_A ) ;
			$avaliacao->setNOTA_B( $row->AVTR_NOTA_B ) ;
			$avaliacao->setNOTA_C( $row->AVTR_NOTA_C ) ;
			$avaliacao->setNOTA_D( $row->AVTR_NOTA_D ) ;
			$avaliacao->setNOTA_E( $row->AVTR_NOTA_E ) ;
			$avaliacao->setNOTA_F( $row->AVTR_NOTA_F ) ;
			$avaliacao->setNOTA_G( $row->AVTR_NOTA_G ) ;
			$avaliacao->setNOTA_H( $row->AVTR_NOTA_H ) ;
			$avaliacao->setNOTA_I( $row->AVTR_NOTA_I ) ;
			$result_list[$result_count] = $avaliacao ;
			$result_count++ ;
		}
		return $result_list ;
	}
	/**
	 * Carrega o valores pelo ID
	 *
	 * @param int $id
	 * @return AvaliacaoTrabalhoDTO
	 */
	function loadAvaliacaoTrabalhoFiltered( $aval_id, $trab_id, $status, $even_id )
	{
		$sql = "SELECT * FROM avaliador_trabalho a, trabalho t WHERE a.TRAB_ID = t.TRAB_ID AND even_id = $even_id " ;
		if ( $aval_id )
		{
			$sql .= " AND a.AVAL_ID = $aval_id " ;
		}
		if ( $trab_id )
		{
			$sql .= " AND t.TRAB_ID = $trab_id " ;
		}
		if ( $status )
		{
			$sql .= " AND AVTR_STATUS = $status" ;
		}
		//echo $sql;
		$result = $this->database->query( $sql ) ;
		$result = $this->database->result ;
		//$row = mysql_fetch_object($result);
		$result_count = 0 ;
		while ( $row = mysql_fetch_object($result) )
		{
			$avaliacao = new avaliacaoTrabalhoDTO() ;
			$avaliacao->setAVAL_ID( $row->AVAL_ID ) ;
			$avaliacao->setTRAB_ID( $row->TRAB_ID ) ;
			$avaliacao->setDATA_ATRIBUIDO( $row->AVTR_DATA_ATRIBUIDO ) ;
			$avaliacao->setDATA_AVALIADO( $row->AVTR_DATA_AVALIADO ) ;
			$avaliacao->setSTATUS( $row->AVTR_STATUS ) ;
			$avaliacao->setCOMENTARIO( $row->AVTR_COMENTARIO ) ;
			$avaliacao->setNOTA_A( $row->AVTR_NOTA_A ) ;
			$avaliacao->setNOTA_B( $row->AVTR_NOTA_B ) ;
			$avaliacao->setNOTA_C( $row->AVTR_NOTA_C ) ;
			$avaliacao->setNOTA_D( $row->AVTR_NOTA_D ) ;
			$avaliacao->setNOTA_E( $row->AVTR_NOTA_E ) ;
			$avaliacao->setNOTA_F( $row->AVTR_NOTA_F ) ;
			$avaliacao->setNOTA_G( $row->AVTR_NOTA_G ) ;
			$avaliacao->setNOTA_H( $row->AVTR_NOTA_H ) ;
			$avaliacao->setNOTA_I( $row->AVTR_NOTA_I ) ;
			$avaliacao->setAREA( $row->TRAB_AREA ) ;
			$avaliacao->setEVEN_ID( $row->EVEN_ID ) ;
			$avaliacao->setINSC_ID( $row->INSC_ID ) ;
			$avaliacao->setDATA( $row->TRAB_DATA ) ;
			$avaliacao->setID_EXTERNO( $row->TRAB_ID_EXTERNO ) ;
			$avaliacao->setOPCAO1( $row->TRAB_OPCAO1 ) ;
			$avaliacao->setOPCAO2( $row->TRAB_OPCAO2 ) ;
			$avaliacao->setOPCAO3( $row->TRAB_OPCAO3 ) ;
			$avaliacao->setOPCAO4( $row->TRAB_OPCAO4 ) ;
			$avaliacao->setOPCAO5( $row->TRAB_OPCAO5 ) ;
			$avaliacao->setAUTORIZACAO( $row->TRAB_AUTORIZACAO ) ;
			$avaliacao->setDATA_APRES( $row->TRAB_DATA_APRES ) ;
			$avaliacao->setTIPO_APRES( $row->TRAB_TIPO_APRES ) ;
			$avaliacao->setTITULO( $row->TRAB_TITULO ) ;
			$avaliacao->setRESUMO( $row->TRAB_RESUMO ) ;
			$avaliacao->setCORPO( $row->TRAB_CORPO ) ;
			$avaliacao->setBIBLIOGRAFIA( $row->TRAB_BIBLIOGRAFIA ) ;
			$avaliacao->setARQ_NOME( $row->TRAB_ARQ_NOME ) ;
			$avaliacao->setARQ_URL( $row->TRAB_ARQ_URL ) ;
			$avaliacao->setARQ_TIPO( $row->TRAB_ARQ_TIPO ) ;
			$avaliacao->setARQ2_NOME( $row->TRAB_ARQ2_NOME ) ;
			$avaliacao->setARQ2_URL( $row->TRAB_ARQ2_URL ) ;
			$avaliacao->setARQ2_TIPO( $row->TRAB_ARQ2_TIPO ) ;
			$avaliacao->setAUTOR_CPF_PASSAPORTE( $row->TRAB_AUTOR_CPF_PASSAPORTE ) ;
			$avaliacao->setAUTOR_NOME( $row->TRAB_AUTOR_NOME ) ;
			$avaliacao->setAUTOR_EMAIL( $row->TRAB_AUTOR_EMAIL ) ;
			$avaliacao->setAUTOR_FONE( $row->TRAB_AUTOR_FONE ) ;
			$avaliacao->setAUTOR_ORGA( $row->TRAB_AUTOR_ORGA ) ;
			$avaliacao->setAUTOR_CIDADE( $row->TRAB_AUTOR_CIDADE ) ;
			$avaliacao->setAUTOR_ESTADO( $row->TRAB_AUTOR_ESTADO ) ;
			$avaliacao->setAUTOR_PAIS( $row->TRAB_AUTOR_PAIS ) ;
			$avaliacao->setAPRES_NOME( $row->TRAB_APRES_NOME ) ;
			$avaliacao->setAPRES_EMAIL( $row->TRAB_APRES_EMAIL ) ;
			$avaliacao->setAPRES_FONE( $row->TRAB_APRES_FONE ) ;
			$avaliacao->setAPRES_ORGA( $row->TRAB_APRES_ORGA ) ;
			$avaliacao->setAUTOR1_NOME( $row->TRAB_AUTOR1_NOME ) ;
			$avaliacao->setAUTOR1_EMAIL( $row->TRAB_AUTOR1_EMAIL ) ;
			$avaliacao->setAUTOR2_NOME( $row->TRAB_AUTOR2_NOME ) ;
			$avaliacao->setAUTOR2_EMAIL( $row->TRAB_AUTOR2_EMAIL ) ;
			$avaliacao->setAUTOR3_NOME( $row->TRAB_AUTOR3_NOME ) ;
			$avaliacao->setAUTOR3_EMAIL( $row->TRAB_AUTOR3_EMAIL ) ;
			$avaliacao->setAUTOR4_NOME( $row->TRAB_AUTOR4_NOME ) ;
			$avaliacao->setAUTOR4_EMAIL( $row->TRAB_AUTOR4_EMAIL ) ;
			$avaliacao->setAUTOR5_NOME( $row->TRAB_AUTOR5_NOME ) ;
			$avaliacao->setAUTOR5_EMAIL( $row->TRAB_AUTOR5_EMAIL ) ;
			$avaliacao->setAUTOR6_NOME( $row->TRAB_AUTOR6_NOME ) ;
			$avaliacao->setAUTOR6_EMAIL( $row->TRAB_AUTOR6_EMAIL ) ;
			$avaliacao->setAUTOR7_NOME( $row->TRAB_AUTOR7_NOME ) ;
			$avaliacao->setAUTOR7_EMAIL( $row->TRAB_AUTOR7_EMAIL ) ;
			$avaliacao->setAUTOR8_NOME( $row->TRAB_AUTOR8_NOME ) ;
			$avaliacao->setAUTOR8_EMAIL( $row->TRAB_AUTOR8_EMAIL ) ;
			$avaliacao->setAUTOR9_NOME( $row->TRAB_AUTOR9_NOME ) ;
			$avaliacao->setAUTOR9_EMAIL( $row->TRAB_AUTOR9_EMAIL ) ;
			$avaliacao->setAUTOR10_NOME( $row->TRAB_AUTOR10_NOME ) ;
			$avaliacao->setAUTOR10_EMAIL( $row->TRAB_AUTOR10_EMAIL ) ;
			$avaliacao->setOBS( $row->TRAB_OBS ) ;
			$result_list[$result_count] = $avaliacao ;
			$result_count++ ;
		}
		return $result_list ;
	}
	/**
	 * Carrega o valores pelo ID
	 *
	 * @param int $id
	 * @return AvaliacaoTrabalhoDTO
	 */
	function loadTrabalhoQtdAvaliacaoFiltered( $aval_id, $trab_id, $status, $even_id )
	{
		$sql = "SELECT * FROM avaliador_trabalho a, trabalho t WHERE a.TRAB_ID = t.TRAB_ID AND even_id = $even_id " ;
		if ( $aval_id )
		{
			$sql .= " AND a.AVAL_ID = $aval_id " ;
		}
		if ( $trab_id )
		{
			$sql .= " AND t.TRAB_ID = $trab_id " ;
		}
		if ( $status )
		{
			$sql .= " AND AVTR_STATUS = $status" ;
		}
		$result = $this->database->query( $sql ) ;
		$result = $this->database->result ;
		//$row = mysql_fetch_object($result);
		$result_count = 0 ;
		while ( $row = mysql_fetch_object($result) )
		{
			$avaliacao = new trabalhoQtdAvaliacaoDTO() ;
			$avaliacao->setQTD( $row->QTD ) ;
			$avaliacao->setID( $row->ID ) ;
			$avaliacao->setSTATUS( $row->STATUS ) ;
			$avaliacao->setEVEN_ID( $row->EVEN_ID ) ;
			$avaliacao->setINSC_ID( $row->INSC_ID ) ;
			$avaliacao->setDATA( $row->TRAB_DATA ) ;
			$avaliacao->setID_EXTERNO( $row->TRAB_ID_EXTERNO ) ;
			$avaliacao->setOPCAO1( $row->TRAB_OPCAO1 ) ;
			$avaliacao->setOPCAO2( $row->TRAB_OPCAO2 ) ;
			$avaliacao->setOPCAO3( $row->TRAB_OPCAO3 ) ;
			$avaliacao->setOPCAO4( $row->TRAB_OPCAO4 ) ;
			$avaliacao->setOPCAO5( $row->TRAB_OPCAO5 ) ;
			$avaliacao->setAUTORIZACAO( $row->TRAB_AUTORIZACAO ) ;
			$avaliacao->setDATA_APRES( $row->TRAB_DATA_APRES ) ;
			$avaliacao->setTIPO_APRES( $row->TRAB_TIPO_APRES ) ;
			$avaliacao->setTITULO( $row->TRAB_TITULO ) ;
			$avaliacao->setRESUMO( $row->TRAB_RESUMO ) ;
			$avaliacao->setCORPO( $row->TRAB_CORPO ) ;
			$avaliacao->setBIBLIOGRAFIA( $row->TRAB_BIBLIOGRAFIA ) ;
			$avaliacao->setARQ_NOME( $row->TRAB_ARQ_NOME ) ;
			$avaliacao->setARQ_URL( $row->TRAB_ARQ_URL ) ;
			$avaliacao->setARQ_TIPO( $row->TRAB_ARQ_TIPO ) ;
			$avaliacao->setARQ2_NOME( $row->TRAB_ARQ2_NOME ) ;
			$avaliacao->setARQ2_URL( $row->TRAB_ARQ2_URL ) ;
			$avaliacao->setARQ2_TIPO( $row->TRAB_ARQ2_TIPO ) ;
			$avaliacao->setAUTOR_CPF_PASSAPORTE( $row->TRAB_AUTOR_CPF_PASSAPORTE ) ;
			$avaliacao->setAUTOR_NOME( $row->TRAB_AUTOR_NOME ) ;
			$avaliacao->setAUTOR_EMAIL( $row->TRAB_AUTOR_EMAIL ) ;
			$avaliacao->setAUTOR_FONE( $row->TRAB_AUTOR_FONE ) ;
			$avaliacao->setAUTOR_ORGA( $row->TRAB_AUTOR_ORGA ) ;
			$avaliacao->setAUTOR_CIDADE( $row->TRAB_AUTOR_CIDADE ) ;
			$avaliacao->setAUTOR_ESTADO( $row->TRAB_AUTOR_ESTADO ) ;
			$avaliacao->setAUTOR_PAIS( $row->TRAB_AUTOR_PAIS ) ;
			$avaliacao->setAPRES_NOME( $row->TRAB_APRES_NOME ) ;
			$avaliacao->setAPRES_EMAIL( $row->TRAB_APRES_EMAIL ) ;
			$avaliacao->setAPRES_FONE( $row->TRAB_APRES_FONE ) ;
			$avaliacao->setAPRES_ORGA( $row->TRAB_APRES_ORGA ) ;
			$avaliacao->setAUTOR1_NOME( $row->TRAB_AUTOR1_NOME ) ;
			$avaliacao->setAUTOR1_EMAIL( $row->TRAB_AUTOR1_EMAIL ) ;
			$avaliacao->setAUTOR2_NOME( $row->TRAB_AUTOR2_NOME ) ;
			$avaliacao->setAUTOR2_EMAIL( $row->TRAB_AUTOR2_EMAIL ) ;
			$avaliacao->setAUTOR3_NOME( $row->TRAB_AUTOR3_NOME ) ;
			$avaliacao->setAUTOR3_EMAIL( $row->TRAB_AUTOR3_EMAIL ) ;
			$avaliacao->setAUTOR4_NOME( $row->TRAB_AUTOR4_NOME ) ;
			$avaliacao->setAUTOR4_EMAIL( $row->TRAB_AUTOR4_EMAIL ) ;
			$avaliacao->setAUTOR5_NOME( $row->TRAB_AUTOR5_NOME ) ;
			$avaliacao->setAUTOR5_EMAIL( $row->TRAB_AUTOR5_EMAIL ) ;
			$avaliacao->setAUTOR6_NOME( $row->TRAB_AUTOR6_NOME ) ;
			$avaliacao->setAUTOR6_EMAIL( $row->TRAB_AUTOR6_EMAIL ) ;
			$avaliacao->setAUTOR7_NOME( $row->TRAB_AUTOR7_NOME ) ;
			$avaliacao->setAUTOR7_EMAIL( $row->TRAB_AUTOR7_EMAIL ) ;
			$avaliacao->setAUTOR8_NOME( $row->TRAB_AUTOR8_NOME ) ;
			$avaliacao->setAUTOR8_EMAIL( $row->TRAB_AUTOR8_EMAIL ) ;
			$avaliacao->setAUTOR9_NOME( $row->TRAB_AUTOR9_NOME ) ;
			$avaliacao->setAUTOR9_EMAIL( $row->TRAB_AUTOR9_EMAIL ) ;
			$avaliacao->setAUTOR10_NOME( $row->TRAB_AUTOR10_NOME ) ;
			$avaliacao->setAUTOR10_EMAIL( $row->TRAB_AUTOR10_EMAIL ) ;
			$avaliacao->setOBS( $row->TRAB_OBS ) ;
			$result_list[$result_count] = $avaliacao ;
			$result_count++ ;
		}
		return $result_list ;
	}
	/**
	 * Carrega o valores pelo ID
	 *
	 * @param int $id
	 * @return AvaliacaoTrabalhoDTO
	 */
	function loadAvaliacaoAvaliadorFiltered( $aval_id, $trab_id, $status, $even_id )
	{
		$sql = "SELECT * FROM avaliador_trabalho t, avaliador a WHERE a.AVAL_ID = t.AVAL_ID AND even_id = $even_id" ;
		if ( $aval_id )
		{
			$sql .= " AND a.AVAL_ID = $aval_id " ;
		}
		if ( $trab_id )
		{
			$sql .= " AND t.TRAB_ID = $trab_id " ;
		}
		if ( $status )
		{
			$sql .= " AND AVTR_STATUS = $status" ;
		}
		$result = $this->database->query( $sql ) ;
		$result = $this->database->result ;
		//$row = mysql_fetch_object($result);
		$result_count = 0 ;
		while ( $row = mysql_fetch_object($result) )
		{
			$avaliacao = new avaliacaoAvaliadorDTO() ;
			$avaliacao->setAVAL_ID( $row->AVAL_ID ) ;
			$avaliacao->setTRAB_ID( $row->TRAB_ID ) ;
			$avaliacao->setDATA_ATRIBUIDO( $row->AVTR_DATA_ATRIBUIDO ) ;
			$avaliacao->setDATA_AVALIADO( $row->AVTR_DATA_AVALIADO ) ;
			$avaliacao->setSTATUS( $row->AVTR_STATUS ) ;
			$avaliacao->setCOMENTARIO( $row->AVTR_COMENTARIO ) ;
			$avaliacao->setNOTA_A( $row->AVTR_NOTA_A ) ;
			$avaliacao->setNOTA_B( $row->AVTR_NOTA_B ) ;
			$avaliacao->setNOTA_C( $row->AVTR_NOTA_C ) ;
			$avaliacao->setNOTA_D( $row->AVTR_NOTA_D ) ;
			$avaliacao->setNOTA_E( $row->AVTR_NOTA_E ) ;
			$avaliacao->setNOTA_F( $row->AVTR_NOTA_F ) ;
			$avaliacao->setNOTA_G( $row->AVTR_NOTA_G ) ;
			$avaliacao->setNOTA_H( $row->AVTR_NOTA_H ) ;
			$avaliacao->setNOTA_I( $row->AVTR_NOTA_I ) ;
			$avaliacao->setNOME( $row->AVAL_NOME ) ;
			$avaliacao->setTELEFONE( $row->AVAL_TELEFONE ) ;
			$avaliacao->setCELULAR( $row->AVAL_CELULAR ) ;
			$avaliacao->setLOGIN( $row->AVAL_LOGIN ) ;
			$avaliacao->setSENHA( $row->AVAL_SENHA ) ;
			$avaliacao->setEVEN_ID( $row->EVEN_ID ) ;
			$result_list[$result_count] = $avaliacao ;
			$result_count++ ;
		}
		return $result_list ;
	}
} // class : end
 ?>