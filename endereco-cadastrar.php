<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Endereço');

use App\Entity\Endereco;
use App\Entity\Devedor;

//VALIDAÇÃO DO GET
$IdDevedor = filter_input(INPUT_GET, 'devedor', FILTER_VALIDATE_INT);
if (!isset($IdDevedor)) {
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


//VALIDAÇÃO DO POST
$PostData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($PostData) && !in_array('', $PostData)):
    $endereco = new Endereco;
    $endereco->setCep($PostData['cep']);
    $endereco->setTipo($PostData['tipo']);
    $endereco->setEndereco($PostData['endereco']);
    $endereco->setNumero($PostData['numero']);
    $endereco->setCidade($PostData['cidade']);
    $endereco->setEstado($PostData['estado']);

    $endereco->cadastrar($devedor);
    header('location: enderecos.php?devedor=' . $IdDevedor . '&status=success');
    exit;
endif;



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/endereco-form.php';
include __DIR__ . '/includes/footer.php';

