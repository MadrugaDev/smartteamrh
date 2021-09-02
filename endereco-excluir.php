<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Devedor;
use \App\Entity\Endereco;

//VALIDAÇÃO DO GET DEVEDOR
$IdDevedor = filter_input(INPUT_GET, 'devedor', FILTER_VALIDATE_INT);
if (!isset($IdDevedor) || empty($IdDevedor)) {
    header('location: enderecos.php?status=error');
    exit;
}

//CONSULTA DEVEDOR
$devedor = Devedor::getDevedor($IdDevedor);

//VALIDAÇÃO DO DEVEDOR
if (!$devedor instanceof Devedor) {
    header('location: index.php?status=error');
    exit;
}


//VALIDAÇÃO DO GET
$Id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!isset($Id) || empty($Id)) {
    header('location: enderecos.php?devedor=' . $IdDevedor . '&status=error');
    exit;
}


//CONSULTA DEVEDOR
$endereco = Endereco::getEnd($Id);

//VALIDAÇÃO DO DEVEDOR
if (!$endereco instanceof Endereco) {
    header('location: enderecos.php?devedor=' . $IdDevedor . '&status=error');
    exit;
}


//VALIDAÇÃO DO POST
$PostData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($PostData['excluir'])):
    $endereco->excluir();

    header('location: enderecos.php?devedor=' . $IdDevedor . '&status=success');
    exit;
endif;


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/endereco-confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';

