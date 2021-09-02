<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Lançamento de Títulos');

use App\Entity\Titulo;
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
    $titulo = new Titulo;
    $titulo->setDescricao($PostData['descricao']);
    $titulo->setValor($PostData['valor']);
    $titulo->setVencimento($PostData['vencimento']);
    $titulo->setStatus($PostData['status']);
    
    $titulo->cadastrar($devedor);
    header('location: titulos.php?devedor=' . $IdDevedor . '&status=success');
    exit;
endif;



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/titulo-form.php';
include __DIR__ . '/includes/footer.php';

