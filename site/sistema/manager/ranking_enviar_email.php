<?
	include_once ( "struct/struct_top.php" ) ;
	include_once ( '../classes/class.trabalho.php' ) ;
	include_once ( '../classes/service.trabalho.php' ) ;
	include_once ( '../classes/class.avaliador.php' ) ;
	include_once ( '../classes/class.avaliacao.php' ) ;
	include_once ( '../classes/service.avaliador.php' ) ;
	include_once ( '../classes/service.avaliacao.php' ) ;
	include_once ( '../classes/dto.avaliacao_avaliador.php' ) ;
	include_once ( '../classes/class.email.php');	
	$trabalhoService = new TrabalhoService() ;
	$trabalho = new Trabalho() ;
	$avaliador = new Avaliador() ;
	$avaliadorService = new AvaliadorService() ;
	$avaliacao = new Avaliacao() ;
	$avaliacaoService = new AvaliacaoService() ; 
	
	if($trabalhoService->todosTrabalhosAvaliados(23) > 0 ){
		echo "Ainda existem trabalhos em avaliação. Finalize todos os trabalhos antes de enviar os emails de seleção.";
	} else {
		$categoriaList = array ('Graduação', 'Pós-graduação', 'Profissional');
		foreach($categoriaList as $categoria){
			echo "<span style='font-size: 12px;	font-weight: bold;'>Enviando mensagens para a categoria '".$categoria ."'</span><br>";
			$trabalhoRankingA = array();
			$trabalhoList = $trabalhoService->listTrabalhosByCategoria( 23, $categoria,8,'ID' ) ;
			if(count($trabalhoList)>0) 
			foreach ( $trabalhoList as $trabalho )
			{	
				$avaliacaoTotal = 0 ;
				$avaliacaoAvaliadorList = $avaliacaoService->loadAvaliacaoAvaliadorFiltered( "", $trabalho->getID(), 8, 23 ) ;
				if(count($avaliacaoAvaliadorList)>0) 
				foreach ( $avaliacaoAvaliadorList as $nota )
				{
					$avaliacaoTotal += $nota->NOTA_A ;
					$avaliacaoTotal += $nota->NOTA_B ;
					$avaliacaoTotal += $nota->NOTA_C ;
					$avaliacaoTotal += $nota->NOTA_E ;
					$avaliacaoTotal += $nota->NOTA_D ;
				}
				if(count($avaliacaoAvaliadorList) > 0){
					$count = count($avaliacaoAvaliadorList);
				} else {
					$count = 1;
				}
		//		$avaliacaoTotal = number_format( $avaliacaoTotal / $count,2,",",".");  
				$trabalhoRankingA[$trabalho->getID()] = $avaliacaoTotal/ $count ;
		
			}
			if(count($trabalhoRankingA)>0) 
			arsort( $trabalhoRankingA ) ;
			
			$count = 0;
			foreach($trabalhoRankingA  as $id => $nt){
				if($count == 30){
					break;
				}
				$trabalho = $trabalhoService->loadTrabalhoById($id,23);
				echo ($count+1).'º&nbsp;-&nbsp;'.$trabalho->getTITULO().'&nbsp;&nbsp;(Nota: '.$nt.')<br>';
				$bodyHtml = '<div style="font-family:arial, helvetica; font-size:10pt; line-height: 150%" align="left">';
				$bodyHtml .= '<b>'.$eventoAtual->getNOME().'</b><br><br>';
				$bodyHtml .= $trabalho->getAPRES_NOME().',<br>';
				$bodyHtml .= 'Parabens! Informamos que o seu trabalho foi selecionado para apresentação oral no 15º Simpósio Internacional de Fisioterapia em Terapia Intensiva. ';
				$bodyHtml .= '<br><br>';
				$bodyHtml .= '<b>ID:</b> '.$trabalho->getID().'<br>';
				$bodyHtml .= '<b>Título:</b>'.$trabalho->getTITULO().'<br>';
			
				$bodyHtml .= '</div>';
				
				$bodyText = $bodyHtml;
				$bodyText = str_replace("<br>", "\n", $bodyText);
				$bodyText = strip_tags($bodyText);
				
				$email = new Email();
				$email->setFromName("aviso@eventoonline.com");
				$email->setFromEmail("aviso@eventoonline.com");
				if ($eventoConfiguracaoXMLAtual->getEmailTrabalho()) $email->setReplyTo($eventoConfiguracaoXMLAtual->getEmailTrabalho());
				$email->setMsgHtml($bodyHtml);
				$email->setMsgText($bodyText);
				$email->setSubject($eventoAtual->getNOME());
				$email->setToEmail($trabalho->getAPRES_EMAIL());
			
				if ($email->send())
				{
					echo "<dd>Mensagem enviada com sucesso para '".$trabalho->getAPRES_EMAIL()."'<br>";
				}
				else
				{
					echo "<dd>Erro ao enviar mensagem para '".$trabalho->getAPRES_EMAIL()."'.<br><br> Possivelmente o e-mail esteja incorreto.";
				}
						
				$count++;
			}
			echo "<br><br>";
			
		}
			
	}
?>
<? include_once("struct/struct_bottom.php")?>