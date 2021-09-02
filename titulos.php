<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Titulo;
use App\Entity\Devedor;

//VALIDAÇÃO DO GET
$IdDevedor = filter_input(INPUT_GET, 'devedor', FILTER_VALIDATE_INT);
if (!isset($IdDevedor) || empty($IdDevedor)) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA DEVEDOR
$devedor = Devedor::getDevedor($IdDevedor);


//VALIDAÇÃO DO DEVEDOR
if (!$devedor instanceof Devedor) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA DEVEDOR
$titulos = Titulo::getTitulos('devedor_id = ' . $IdDevedor);


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/titulo-listagem.php';
include __DIR__ . '/includes/footer.php';

