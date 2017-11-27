<?

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Adicionar ou subtrair dias
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function fnc_date_calc($this_date,$num_days){
   
    $my_time = strtotime ($this_date); //converts date string to UNIX timestamp
    $timestamp = $my_time + ($num_days * 86400); //calculates # of days passed ($num_days) * # seconds in a day (86400)
    //$return_date = date("Y-m-d H:i:s",$timestamp);  //puts the UNIX timestamp back into string format
   
    return $timestamp;//exit function and return string
}//end of function

/*
$date_to_test = "2006/08/11";
$days_to_add = 7;

$past_date = fnc_date_calc($date_to_test,(($days_to_add)*-1));
$future_date = fnc_date_calc($date_to_test,$days_to_add);
*/

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Função para transformar aspas simples em aspas duplas
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function transformSingleQuotes($string) {

	$string = str_replace("'",'"',$string);
	return $string;
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Função para limpar String antes de exportar para XML
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function cleanToXML($string) {
	$string = str_replace('&',' ',$string);
	$string = str_replace('<',' ',$string);
	$string = str_replace('>',' ',$string);
	return $string;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Função para salvar arquivo em uma pasta específica
 *
 * >> Exemplo de Uso
 *		Usage: uploadfile($_FILE['file']['name'],'temp/',$_FILE['file']['tmp_name'])
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function uploadfile($origin, $dest, $tmp_name) {
  $origin = strtolower(basename($origin));
  $fulldest = $dest.$origin;
  $filename = $origin;
  for ($i=1; file_exists($fulldest); $i++)
  {
   $fileext = (strpos($origin,'.')===false?'':'.'.substr(strrchr($origin, "."), 1));
   $filename = substr($origin, 0, strlen($origin)-strlen($fileext)).'['.$i.']'.$fileext;
   $fulldest = $dest.$filename;
  }
 
  if (move_uploaded_file($tmp_name, $fulldest))
   return $filename;
  return false;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Função para converter valores no formato brasileiro para americano
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function brazilConvertNumber($number) {
	$number = str_replace(".","",$number);
	$number = str_replace(",",".",$number);

	return $number;
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Função que elimina espaços duplos, trocando por espaço simples
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function removeDoubleSpaces($string) {
	while (strstr($string,"  ")) {
		$string = str_replace("  ", " ", $string); 
	}
	return $string;
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Transforma data/hora do Brazil para timestamp
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function dataHoraBrToTime($data_horario) {

	$data_horario = trim($data_horario);
	$data_horario_array = explode(" ",$data_horario);
	$data = $data_horario_array[0];
	$horario = $data_horario_array[1];

	$data_array = explode("/",$data);
	$dia = $data_array[0] + 0;
	$mes = $data_array[1] + 0;
	$ano = $data_array[2] + 0;

	$horario_array = explode(":",$horario);
	if ($horario_array[0]) $hora = $horario_array[0] + 0; else $hora = 0;
	if ($horario_array[1]) $min = $horario_array[1] + 0; else $min = 0;
	if ($horario_array[2]) $seg = $horario_array[2] + 0; else $seg = 0;

	$time = mktime($hora,$min,$seg,$mes,$dia,$ano);
	return $time;

}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Data de hoje por extenso
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	
function dataPorExtenso($data) {

	// Script que mostra a data atual por extenso
	// Autor: Juliano Niederauer
	// http://www.niederauer.com.br
	
	// o array $data possui agora os elementos seconds, minutes, hours, mday, wday, mon, year, yday, weekday e month
	//$data = time();
	$data_array = getdate($data);
	
	if($data_array["wday"]==0) { echo "Domingo, "; }
	elseif($data_array["wday"]==1) { echo "Segunda-feira, "; }
	elseif($data_array["wday"]==2) { echo "Terça-feira, "; }
	elseif($data_array["wday"]==3) { echo "Quarta-feira, "; }
	elseif($data_array["wday"]==4) { echo "Quinta-feira, "; }
	elseif($data_array["wday"]==5) { echo "Sexta-feira, "; }
	elseif($data_array["wday"]==6) { echo "Sábado, "; }
	
	if($data_array["mon"]==1) { $mes="Janeiro"; }
	elseif($data_array["mon"]==2) { $mes="Fevereiro"; }
	elseif($data_array["mon"]==3) { $mes="Março"; }
	elseif($data_array["mon"]==4) { $mes="Abril"; }
	elseif($data_array["mon"]==5) { $mes="Maio"; }
	elseif($data_array["mon"]==6) { $mes="Junho"; }
	elseif($data_array["mon"]==7) { $mes="Julho"; }
	elseif($data_array["mon"]==8) { $mes="Agosto"; }
	elseif($data_array["mon"]==9) { $mes="Setembro"; }
	elseif($data_array["mon"]==10) { $mes="Outubro"; }
	elseif($data_array["mon"]==11) { $mes="Novembro"; }
	elseif($data_array["mon"]==12) { $mes="Dezembro"; }
	
	return $data_array["mday"]." de ".$mes." de ".$data_array["year"];	
	
}

/*
    valorPorExtenso - ? :)
    Copyright (C) 2000 andre camargo

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.

    Andr&eacute;) Ribeiro Camargo (acamargo@atlas.ucpel.tche.br)
    Rua Silveira Martins, 592/102
    Canguçu-RS-Brasil
    CEP 96.600-000
*/

// funcao............: valorPorExtenso
// ---------------------------------------------------------------------------
// desenvolvido por..: andré camargo
// versoes...........: 0.1 19:00 14/02/2000
//                     1.0 12:06 16/02/2000
// descricao.........: esta função recebe um valor numérico e retorna uma 
//                     string contendo o valor de entrada por extenso
// parametros entrada: $valor (formato que a função number_format entenda :)
// parametros saída..: string com $valor por extenso

function valorPorExtenso($valor=0) {
	$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
	$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");

	$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
	$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
	$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
	$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");

	$z=0;

	$valor = number_format($valor, 2, ".", ".");
	$inteiro = explode(".", $valor);
	for($i=0;$i<count($inteiro);$i++)
		for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
			$inteiro[$i] = "0".$inteiro[$i];

	// $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
	$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
	for ($i=0;$i<count($inteiro);$i++) {
		$valor = $inteiro[$i];
		$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
		$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
		$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
	
		$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
		$t = count($inteiro)-1-$i;
		$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
		if ($valor == "000")$z++; elseif ($z > 0) $z--;
		if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
		if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
	}

	return($rt ? $rt : "zero");
}


function strtolower2($Texto) {
	$Array1 = array('à','á','â','ã','é','è','ê','ó','ò','ô','õ','ú','ù','û','ü','ä','ë','ï','ö','ç','í');
	$Array2 = array('À','Á','Â','Ã','É','È','Ê','Ó','Ò','Ô','Õ','Ú','Ù','Û','Ü','Ä','Ë','Ï','Ö','Ç','Í');
	for ($X = 0; $X < count($Array1); $X++) {
		$Texto = str_replace($Array2[$X],$Array1[$X],$Texto);
	}
	return strtolower($Texto);
}                     

function strtoupper2($Texto) {
	$Array1 = array('À','Á','Â','Ã','É','È','Ê','Ó','Ò','Ô','Õ','Ú','Ù','Û','Ü','Ä','Ë','Ï','Ö','Ç','Í');
	$Array2 = array('à','á','â','ã','é','è','ê','ó','ò','ô','õ','ú','ù','û','ü','ä','ë','ï','ö','ç','í');
	for ($X = 0; $X < count($Array1); $X++) {
		$Texto = str_replace($Array2[$X],$Array1[$X],$Texto);
	}
	return strtoupper($Texto);
}                     
					
?>