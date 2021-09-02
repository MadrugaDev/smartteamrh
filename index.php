<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Devedor;

$devedores = Devedor::getDevedores();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/devedor-listagem.php';
include __DIR__ . '/includes/footer.php';

