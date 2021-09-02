<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Devedor;
use \App\Entity\Titulo;

//VALIDAÇÃO DO GET DEVEDOR
$IdDevedor = filter_input(INPUT_GET, 'devedor', FILTER_VALIDATE_INT);
if (!isset($IdDevedor) || empty($IdDevedor)) {
    header('location: titulos.php?status=error');
    exit;
}

//CONSULTA DEVEDOR
$devedor = Devedor::getDevedor($IdDevedor);

//VALIDAÇÃO DO DEVEDOR
if (!$devedor instanceof Devedor) {
    header('location: titulos.php?status=error');
    exit;
}


//VALIDAÇÃO DO GET
$Id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!isset($Id) || empty($Id)) {
    header('location: titulos.php?devedor=' . $IdDevedor . '&status=error');
    exit;
}


//CONSULTA DEVEDOR
$titulo = Titulo::getTitulo($Id);

//VALIDAÇÃO DO DEVEDOR
if (!$titulo instanceof Titulo) {
    header('location: titulos.php?devedor=' . $IdDevedor . '&status=error');
    exit;
}


//VALIDAÇÃO DO POST
$PostData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($PostData['excluir'])):
    $titulo->excluir();

    header('location: titulos.php?devedor=' . $IdDevedor . '&status=success');
    exit;
endif;


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/titulo-confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';

