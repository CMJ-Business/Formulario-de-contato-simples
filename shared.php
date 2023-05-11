<?php

if (!isset($_SESSION)) {
    session_start();
}

define('CONFIG',  require_once __DIR__ . '/config.php');

putenv('debug_mode=1'); // !!! Em produção mude para 0

$_POST = isset($_POST) ? $_POST : [];
$_GET = isset($_GET) ? $_GET : [];

function config($key, $defaultValue = null)
{
    if (!in_array(gettype($key), ['string', 'null', 'integer'], true)) {
        return null;
    }

    if ($key === '' || $key === null) {
        return CONFIG;
    }

    return isset(CONFIG[$key]) ? CONFIG[$key] : $defaultValue;
}

function dd($content = '')
{
    die(sprintf(
        '%s %s %s',
        '<pre>',
        json_encode($content, 64),
        '</pre>',
    ));
}

function isDebugMode()
{
    try {
        return (bool) getenv('debug_mode');
    } catch (\Throwable $th) {
        return false;
    }
}

function serverError($message, $httpCode = 500)
{
    http_response_code((int) $httpCode);

    if (isDebugMode()) {
        throw new \Exception($message, 1);
    }

    die($message);
}

function formError($message)
{
    http_response_code(422);

    die(sprintf('<h3>Erro no formulário</h3><br><strong>%s</strong>', $message));
}

function getData($key, $from, $defaultValue = '')
{
    try {
        return isset($from[$key]) ? $from[$key] : $defaultValue;
    } catch (\Throwable $th) {

        if (isDebugMode()) {
            throw $th;
        }

        return '
        ';
    }
}
