<?php
require_once __DIR__ . '/shared.php';

// $twCss  = 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css';
$twCss  = 'https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css';

$layouts = [
    'form1',
    'form2',
    'form3',
];

$layout = in_array(
    getData('layout', $_GET),
    $layouts,
    true
) ? getData('layout', $_GET) : 'form3';

$embed = getData('embed', $_GET) ? true : false;

/**
 * PARA USAR COMO EMBED:
 * http://ENDERECO-DO-FORMULARIO?layout=form3&embed=true
 *
 * ENDERECO-DO-FORMULARIO exemplo http://site.com/form/abc/index.php ficaria:
 * http://site.com/form/abc/?layout=form3
 *
 * Se deixar o parâmetro 'embed' como true, o formulário será enviado em uma nova guia, caso ausente, ou false/0
 * Abrirá dentro do embed
 *
 * * http://ENDERECO-DO-FORMULARIO?layout=form3&embed=true
 */

/*
<iframe
    src="http://ENDERECO-DO-FORMULARIO?layout=form3"
    frameborder="0"
    style="width: 100%; height: 100vh; margin: 0;"

></iframe>
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $twCss ?>" rel="stylesheet">
    <title>Formulário de Contato</title>
</head>

<body>
    <?php require_once __DIR__ . "/{$layout}.php"; ?>
</body>

</html>
