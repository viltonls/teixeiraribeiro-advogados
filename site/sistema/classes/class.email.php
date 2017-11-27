<?php

require("class.phpmailer.php");
require("class.smtp.php");

// **********************
// CLASS DECLARATION
// **********************

class email
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $fromName;
var $fromEmail;
var $toEmail;
var $msgHtml;
var $msgText;
var $subject;
var $replyTo;

// **********************
// CONSTRUCTOR METHOD
// **********************

function email() {

}



function getFromName() {
	return $this->fromName;
}

function getFromEmail() {
	return $this->fromEmail;
}


function getToEmail() {
	return $this->toEmail;
}

function getMsgHtml() {
	return $this->msgHtml;
}

function getMsgText() {
	return $this->msgText;
}

function getSubject() {
	return $this->subject;
}

function getReplyTo() {
	return $this->replyTo;
}


function setFromName($val) {
	$this->fromName =  $val;
}

function setFromEmail($val) {
	$this->fromEmail =  $val;
}

function setToEmail($val) {
	$this->toEmail =  $val;
}

function setMsgHtml($val) {
	$this->msgHtml =  $val;
}

function setMsgText($val) {
	$this->msgText =  $val;
}

function setSubject($val) {
	$this->subject =  $val;
}

function setReplyTo($val) {
	$this->replyTo =  $val;
}

function send() {

	$smtp = new SMTP();
	$mail = new PHPMailer();
	
	$mail->Mailer = "smtp";
	$mail->Host = "smtp.eventoonline.com"; // SMTP server
	$mail->SMTPAuth = true;
	$mail->Timeout = 5; 
	$mail->Username = "aviso@eventoonline.com"; 
	$mail->Password = "Eol2341force"; 
	$mail->Charset = "iso-8859-1";
	$mail->ContentType = "text/html";
	$mail->WordWrap = 50;
	$mail->FromName = $this->fromName;
	$mail->From = $this->fromEmail;
	$mail->Sender = $this->fromEmail;
	$mail->AddReplyTo($this->replyTo,"");
	
	$mail->Subject = stripslashes($this->subject);
	$mail->Body = $this->msgHtml;
	$mail->AltBody = $this->msgText;
	$mail->message_type = "alt";
	$mail->Encoding = "quoted-printable";

	$mail->AddAddress($this->toEmail);

	// Verifica se é email válido
	//if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $to)) {

	// Conecta no servidor (se utilizar SMTP autenticado)
	if ($mail->SmtpConnect()) {
		    //echo $mail->CreateHeader();
		    //echo "<Br><br>";
		    //echo $mail->CreateBody();
		    //echo "<Br><br>";
			if($mail->SmtpSend($mail->CreateHeader(),$mail->CreateBody())) {
				// Enviado!
				return true;
				
			} else {
				//echo "Erro na tentativa 1";
				// Erro ao enviar

				// Tenta novamente
				$mail->SmtpClose();
				$mail->SmtpConnect();
				if($mail->SmtpSend($mail->CreateHeader(),$mail->CreateBody())) {
					// Enviado!
					return true;
					
				} else {
					// Erro ao enviar
					//echo "Erro na tentativa 2";
					$mail->SmtpClose();
					return false;
					
				}
				
			}
	} else {
		//echo "Erro ao conetar no SMTP";
		
	}
	
}



} // class : end

?>