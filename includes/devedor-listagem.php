<?php
//VALIDAÇÃO DO GET
$Status = filter_input(INPUT_GET, 'status', FILTER_DEFAULT);

$mensagem = '';
if (isset($Status)) {
    switch ($Status) {
        case 'success':
            $mensagem .= '<div class="alert alert-success">:) Tudo Certo! A ação foi realizada com sucesso.</div>';
            break;

        case 'error':
            $mensagem .= '<div class="alert alert-danger">:) OPPsss! A ação não foi realizada.</div>';
            break;

        default:
            break;
    }
}
$resultados = '';
foreach ($devedores as $devedor) {
    $resultados .= '<tr>
                        <td>' . $devedor->getId() . '</td>
                        <td>' . $devedor->getDocumento() . '</td>
                        <td>' . $devedor->getNome() . ' ' . $devedor->getSobrenome() . '</td>
                        <td class="celular">' . $devedor->getCelular() . '</td>
                        <td>' . date('d/m/Y', strtotime($devedor->getNascimento())) . '</td>
                        <td>
                            <a href="enderecos.php?devedor=' . $devedor->getId() . '">
                                <button class="btn btn-link">Ver Endereço</button>
                            </a>
                        </td>
                        <td>
                            <a href="titulos.php?devedor=' . $devedor->getId() . '">
                                <button class="btn btn-link">Ver Títulos</button>
                            </a>
                        </td>
                        <td>
                            <a href="devedor-editar.php?id=' . $devedor->getId() . '">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="devedor-excluir.php?id=' . $devedor->getId() . '">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="8" class="text-center">Não existe devedores!</td></tr>';
?>
<main>
    <section class="bg-dark text-light p-3">
        <a href="devedor-cadastrar.php">
            <button class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
                Cadastrar Devedor
            </button>
        </a>
    </section>

    <section class="bg-light p-1">
         <?= $mensagem ?>
           
        <table class="table table-striped bg-light ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cpf/Cnpj</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Nascimento</th>
                    <th>Endereço</th>
                    <th>Títulos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.8em;">
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>
