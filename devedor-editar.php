<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Devedor');

use \App\Entity\Devedor;

//VALIDAÇÃO DO GET
$IdDevedor = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
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
    $devedor->setDocumento($PostData['documento']);
    $devedor->setNome($PostData['nome']);
    $devedor->setSobrenome($PostData['sobrenome']);
    $devedor->setTelefone($PostData['telefone']);
    $devedor->setCelular($PostData['celular']);
    $devedor->setNascimento($PostData['nascimento']);
    
    $devedor->atualizar();
    
    header('location: index.php?status=success');
    exit;
endif;



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/devedor-form.php';
include __DIR__ . '/includes/footer.php';

