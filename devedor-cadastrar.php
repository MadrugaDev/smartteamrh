<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Devedor');

use \App\Entity\Devedor;

//VALIDAÇÃO DO POST
$PostData = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(isset($PostData) && !in_array('', $PostData)):

    $devedor = new Devedor;
    $devedor->setDocumento($PostData['documento']);
    $devedor->setNome($PostData['nome']);
    $devedor->setSobrenome($PostData['sobrenome']);
    $devedor->setTelefone($PostData['telefone']);
    $devedor->setCelular($PostData['celular']);
    $devedor->setNascimento($PostData['nascimento']);
    
    $devedor->cadastrar();
    header('location: index.php?status=success');
    exit;
endif;



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/devedor-form.php';
include __DIR__ . '/includes/footer.php';

