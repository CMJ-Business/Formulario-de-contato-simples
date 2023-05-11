<?php

use PHPMailer\PHPMailer;
use PHPMailer\Exception;

$timezone = 'America/Sao_Paulo';
date_default_timezone_set($timezone);

/**
 * TODO:
 * Em caso de erro, redirecionar para o formulário informando o erro
 */

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

require_once __DIR__ . '/shared.php';

// Função para validar o email
function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para limpar os dados enviados pelo formulário
function limparDados($dados)
{
    return htmlspecialchars(trim($dados));
}

// Verifica se todos os campos obrigatórios foram preenchidos e válidos
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    serverError('Contate o desenvolvedor');
    exit;
}

$nome = limparDados(getData('nome', $_POST));
$telefone = limparDados(getData('telefone', $_POST));
$email = limparDados(getData('email', $_POST));
$assunto = limparDados(getData('assunto', $_POST));
$setor = limparDados(getData('setor', $_POST));
$mensagem = limparDados(getData('mensagem', $_POST));

$layout = ($layout = getData('layout', $_GET)) ? "layout={$layout}" : '';
$embed = ($embed = getData('embed', $_GET)) ? "embed={$embed}" : '';

$data = [
    'nome' => $nome,
    'telefone' => $telefone,
    'email' => $email,
    'assunto' => $assunto,
    'setor' => $setor ? $setor : 'outros',
    'Data e hora' => date('d/m/Y H:i:s') . " - TZ: {$timezone}",
    'mensagem' => ($mensagem ? nl2br("\n{$mensagem}") : $mensagem),
];

$empty = array_filter($data, function ($valor) {
    return !$valor;
});

$invalidFiels = array_filter($empty, function ($key) {
    return in_array($key, [
        'nome',
        'email',
        'assunto',
        'mensagem',
    ], true);
}, ARRAY_FILTER_USE_KEY);

$formularioInfo = 'index.php?' . implode('&', [
    $layout,
    $embed,
]);

if ($invalidFiels) {
    formError(
        sprintf(
            "Os campos abaixo são obrigatórios: <br>- %s <br><br> <a href=\"%s\">voltar</a>",
            implode('<br> - ', array_keys($invalidFiels)),
            $formularioInfo,
        )
    );
    exit;
}

if (!validarEmail($email)) {
    formError("Por favor, forneça um endereço de email válido. <br> <a href=\"{$formularioInfo}\">voltar</a>");
    exit;
}

// Configurações do PHPMailer
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->isHtml(true);
$mail->Host = config('email_host');
$mail->Port = config('email_port');
$mail->SMTPAuth = config('email_smtp_auth');
$mail->Username = config('email_username');
$mail->Password = config('email_password');
$mail->SMTPSecure = config('email_smtp_secure');
$mail->SMTPAutoTLS = false;

try {
    $emailFrom = config('email_from', $email);

    // Envia o email
    $mail->setFrom($emailFrom);
    $mail->CharSet = 'utf-8';
    $mail->Subject = "{$assunto} - Setor: " . strtoupper($setor);

    $setores = config('setores', []);
    $emailsDestino = $setores[$setor] ?? [config('email_to_default')];

    foreach ($emailsDestino as $emailDestino) {
        $mail->addAddress($emailDestino);
    }

    $body = '<ul>';

    $body .= '<li><h3>Contato via formulário</h3></li>';

    foreach ($data as $key => $value) {
        $body .= sprintf(
            '<li><strong>%s:</strong> %s</li>',
            ucfirst($key),
            $value,
        );
    }

    $body .= '</ul>';

    $mail->Body = $body;

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    if (isDebugMode()) {
        throw new \Exception("Ocorreu um erro ao enviar a mensagem: {$mail->ErrorInfo}", 1);
    }

    serverError('Contate o desenvolvedor');
    exit;
}
