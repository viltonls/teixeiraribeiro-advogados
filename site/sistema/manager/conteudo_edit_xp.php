<?
include_once('../classes/class.conteudo.php');
include_once('../classes/service.conteudo.php');

// Insere variсveis do Form na Classe
$conteudo = new Conteudo();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$conteudo->select($_REQUEST["id"]);
	$conteudo->setDataModificacao(date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))));
} else {
	$conteudo->setDataCadastro(date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))));
}

// Preenche os dados editados
$conteudo->setId($_REQUEST["id"]);
$conteudo->setTitulo($_REQUEST["titulo"]);
$conteudo->setCorpo(addslashes($_REQUEST["corpo"]));

if ($_REQUEST["data"] != "") {
	$data = date("Y-m-d H:i:s",mktime(0,0,0,substr($_REQUEST["data"],3,2),substr($_REQUEST["data"],0,2),substr($_REQUEST["data"],6,4)));
} else if ($conteudo->getData() == "" || $conteudo->getData() == "1999-11-30 00:00:00" || $conteudo->getData() == "0000-00-00 00:00:00") {
	$data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
} else {
	$data = $conteudo->getData();
}
//echo "Data: ".$data;
$conteudo->setData($data);
//echo $conteudo->getId()." -> ".$conteudo->getData(); break;
$conteudo->setLink($_REQUEST["link"]);
$conteudo->setCampo1($_REQUEST["campo1"]);
$conteudo->setCampo2($_REQUEST["campo2"]);
$conteudo->setCampo3($_REQUEST["campo3"]);
//$conteudo->setDataCadastro($_REQUEST[""]);
$conteudo->setDataModificacao(null);
$conteudo->setStatus($_REQUEST["status"]);
$conteudo->setTipo($_REQUEST["tipo"]);
$conteudo->setOrdem($_REQUEST["ordem"]);
$conteudo->setIdioma($_REQUEST["idioma"]);
$conteudo->setLegendaA($_REQUEST["legenda_a"]);
$conteudo->setLegendaB($_REQUEST["legenda_b"]);
$conteudo->setLegendaC($_REQUEST["legenda_c"]);
$conteudo->setLegendaD($_REQUEST["legenda_d"]);
$conteudo->setLegendaE($_REQUEST["legenda_e"]);
$conteudo->setLegendaF($_REQUEST["legenda_f"]);
$conteudo->setLegendaG($_REQUEST["legenda_g"]);
$conteudo->setLegendaH($_REQUEST["legenda_h"]);
$conteudo->setLegendaI($_REQUEST["legenda_i"]);
$conteudo->setLegendaJ($_REQUEST["legenda_j"]);
$conteudo->setLegendaK($_REQUEST["legenda_k"]);

/* Inicia tratamento das Imagens */
if ($_FILES["imagem_a"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_a_ext = strtolower(end(explode('.', $_FILES['imagem_a']['name'])));
	$conteudo->setImagemA($imagem_a_ext);
}
if ($_FILES["imagem_b"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_b_ext = strtolower(end(explode('.', $_FILES['imagem_b']['name'])));
	$conteudo->setImagemB($imagem_b_ext);
}
if ($_FILES["imagem_c"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_c_ext = strtolower(end(explode('.', $_FILES['imagem_c']['name'])));
	$conteudo->setImagemC($imagem_c_ext);
}
if ($_FILES["imagem_d"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_d_ext = strtolower(end(explode('.', $_FILES['imagem_d']['name'])));
	$conteudo->setImagemD($imagem_d_ext);
}
if ($_FILES["imagem_e"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_e_ext = strtolower(end(explode('.', $_FILES['imagem_e']['name'])));
	$conteudo->setImagemE($imagem_e_ext);
}
if ($_FILES["imagem_f"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_f_ext = strtolower(end(explode('.', $_FILES['imagem_f']['name'])));
	$conteudo->setImagemF($imagem_f_ext);
}
if ($_FILES["imagem_g"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_g_ext = strtolower(end(explode('.', $_FILES['imagem_g']['name'])));
	$conteudo->setImagemG($imagem_g_ext);
}
if ($_FILES["imagem_h"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_h_ext = strtolower(end(explode('.', $_FILES['imagem_h']['name'])));
	$conteudo->setImagemH($imagem_h_ext);
}
if ($_FILES["imagem_i"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_i_ext = strtolower(end(explode('.', $_FILES['imagem_i']['name'])));
	$conteudo->setImagemI($imagem_i_ext);
}
if ($_FILES["imagem_j"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_j_ext = strtolower(end(explode('.', $_FILES['imagem_j']['name'])));
	$conteudo->setImagemJ($imagem_j_ext);
}
if ($_FILES["imagem_k"]['name'] != "") {
	// Obtщm a extensуo da imagem para depois gravar no BD
	$imagem_k_ext = strtolower(end(explode('.', $_FILES['imagem_k']['name'])));
	$conteudo->setImagemK($imagem_k_ext);
}

$conteudo->setId($_REQUEST["id"]);

$conteudo->save();

if ($_FILES['imagem_a']['name'] != "") {
	// Salva arquivo no disco
	$imagem_a_arquivo = "../images/".$conteudo->getId()."_a.".$imagem_a_ext;
	copy($_FILES['imagem_a']['tmp_name'], $imagem_a_arquivo);
}
if ($_FILES['imagem_b']['name'] != "") {
	// Salva arquivo no disco
	$imagem_b_arquivo = "../images/".$conteudo->getId()."_b.".$imagem_b_ext;
	copy($_FILES['imagem_b']['tmp_name'], $imagem_b_arquivo);
}
if ($_FILES['imagem_c']['name'] != "") {
	// Salva arquivo no disco
	$imagem_c_arquivo = "../images/".$conteudo->getId()."_c.".$imagem_c_ext;
	copy($_FILES['imagem_c']['tmp_name'], $imagem_c_arquivo);
}
if ($_FILES['imagem_d']['name'] != "") {
	// Salva arquivo no disco
	$imagem_d_arquivo = "../images/".$conteudo->getId()."_d.".$imagem_d_ext;
	copy($_FILES['imagem_d']['tmp_name'], $imagem_d_arquivo);
}
if ($_FILES['imagem_e']['name'] != "") {
	// Salva arquivo no disco
	$imagem_e_arquivo = "../images/".$conteudo->getId()."_e.".$imagem_e_ext;
	copy($_FILES['imagem_e']['tmp_name'], $imagem_e_arquivo);
}
if ($_FILES['imagem_f']['name'] != "") {
	// Salva arquivo no disco
	$imagem_f_arquivo = "../images/".$conteudo->getId()."_f.".$imagem_f_ext;
	copy($_FILES['imagem_f']['tmp_name'], $imagem_f_arquivo);
}


header("Location: ".$_REQUEST["redirect"]."?idioma=".$conteudo->getIdioma());

?>