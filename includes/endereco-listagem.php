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
foreach ($enderecos as $endereco) {
    $resultados .= '<tr>
                        <td>' . $endereco->getId() . '</td>
                        <td>' . $endereco->getCep() . '</td>
                        <td>' . $endereco->getTipo() . '</td>
                        <td>' . $endereco->getEndereco() . ', ' . $endereco->getNumero() . '</td>
                        <td>' . $endereco->getCidade() . '</td>
                        <td>' . $endereco->getEstado() . '</td>
                        <td>
                            <a href="endereco-editar.php?devedor=' . $IdDevedor . '&id=' . $endereco->getId() . '">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="endereco-excluir.php?devedor=' . $IdDevedor . '&id=' . $endereco->getId() . '">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>';
}

$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="7" class="text-center">Não existe endereços para este devedor!</td></tr>';
?>
<main>
    <section class="bg-dark text-light p-3">
        <a href="index.php">
            <button class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                </svg>
                Voltar
            </button>
        </a>
        <a href="endereco-cadastrar.php?devedor=<?= $devedor->getId() ?>">
            <button class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg> 
                Novo Endereço para <?= $devedor->getNome() ?> 
            </button>
        </a>
    </section>

    <section class="bg-light p-1">
        <?= $mensagem ?>

        <table class="table table-striped bg-light">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cep</th>
                    <th>Tipo</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.8em;">
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>
