

<?php
if(isset($_POST['enviar'])) {

$remetente = "formulario@teixeiraribeiro.com"; // INSIRA AQUI UM EMAIL CRIADO EM SUA HOSPEDAGEM PARA QUE A MENSAGEM SEJA ENVIADA CORRETAMENTE.
$destinatario = "tr@teixeiraribeiro.com"; // INSIRA AQUI O ENDEREÇO DO DESTINATÁRIO DO E-MAIL.

$charset = $_POST['charset'];
$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$comentarios = $_POST['comentarios'];

$corpo = "Nome: ".$nome."<br/>Cidade: ".$cidade."<br/>Estado: ".$estado."<br/>E-mail: ".$email."<br/>Telefone: ".$telefone."<br/>Mensagem: ".$comentarios."";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=".$charset."\r\n";
$headers .= "Bcc: james.zortea@gmail.com\r\n";
//$headers .= "Cc: copiaoculta@seudominio\r\n"; CAMPO COPIA OCULTA OPCIONAL
$headers .= "From: ".$remetente."\r\n";

if(mail($destinatario, 'Formulário do Site', $corpo, $headers)) {
//echo '<p><b>' . $nome . '</b>, sua mensagem foi efetuada com sucesso.<br />Em breve lhe responderemos.</p>';
header ('Location: http://teixeiraribeiro.com/sucesso.htm');
}

else {
echo '<p><b>' . $nome . '</b>, n&atilde;o foi poss&iacute;vel enviar sua mensagem.<br />Tente novamente.</p>';
}
}
else {
echo '<p>N&atilde;o foi poss&iacute;vel enviar sua mensagem.<br />Tente novamente.</p>';
}
?>