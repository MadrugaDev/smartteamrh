<main>
    <section class="bg-dark text-light p-3">
        <a href="enderecos.php?devedor=<?= $IdDevedor ?>">
            <button class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                </svg>
                Voltar
            </button>
        </a>
    </section>

    <div class="col">
        <h2 class="h6 text-left text-dark mt-3"><?= TITLE ?> para <?= $devedor->getNome() ?></h2>

        <form class="p-1" method="post">
            <div class="form-group">
                <label>Cep</label>
                <input type="text" name="cep" value="<?= isset($endereco) ? $endereco->getCep() : null ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tipo</label>
                <input type="text" name="tipo" value="<?= isset($endereco) ? $endereco->getTipo() : null ?>" class="form-control required">
            </div>

            <div class="form-group">
                <label>Endereço</label>
                <input type="text" name="endereco" value="<?= isset($endereco) ? $endereco->getEndereco() : null ?>" class="form-control required">
            </div>

            <div class="form-group">
                <label>Número</label>
                <input type="text" name="numero" value="<?= isset($endereco) ? $endereco->getNumero() : null ?>" class="form-control required">
            </div>

            <div class="form-group">
                <label>Cidade</label>
                <input type="text" name="cidade" value="<?= isset($endereco) ? $endereco->getCidade() : null ?>" class="form-control required">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <input type="text" name="estado" value="<?= isset($endereco) ? $endereco->getEstado() : null ?>" class="form-control required">
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>    
</main>
