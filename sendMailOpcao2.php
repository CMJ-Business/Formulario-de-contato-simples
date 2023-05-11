<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * TODO:
 * Em caso de erro, redirecionar para o formulário informando o erro
 */

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

require_once __DIR__ . '/shared.php';

// Configurações de autenticação SMTP
$host = 'smtp.seudominio.com.br';
$porta = 1025;
$usuario = 'seu_usuario';
$senha = 'sua_senha';

// Dados do remetente e destinatário
$remetente = getData('email', $_POST);
$destinatario = 'contato@contato.com';
$assunto = getData('assunto', $_POST);
$mensagem = getData('mensagem', $_POST);

// Validação dos campos
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['assunto']) || empty($_POST['mensagem'])) {
    formError('Por favor, preencha todos os campos.');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    formError('Por favor, informe um e-mail válido.');
    exit;
}

// Cria uma instância da classe PHPMailer
$mail = new PHPMailer();

// Configura as informações de autenticação SMTP
$mail->isSMTP();
$mail->Host = $host;
$mail->Port = $porta;
$mail->SMTPAuth = true;
$mail->Username = $usuario;
$mail->Password =  'senha';

// Configura as informações de remetente e destinatário
$mail->setFrom($remetente);
$mail->addAddress($destinatario);
$mail->addReplyTo($remetente);

// Configura o assunto e o corpo da mensagem
$mail->Subject = $assunto;
$mail->Body = $mensagem;

// Envia o email
if ($mail->send()) {
    if (isDebugMode()) {
        throw new \Exception("Ocorreu um erro ao enviar a mensagem: {$mail->ErrorInfo}", 1);
    }

    serverError('Contate o desenvolvedor');
    exit;
}

header('Location: confirmacao.php');
