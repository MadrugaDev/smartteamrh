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
    </section>

    <div class="row">
        <div class="col">
            <h2 class="h6 text-left text-dark mt-3"><?= TITLE ?></h2>

            <form class="p-1" method="post">
                <div class="form-group">
                    <label>Cpf/Cnpj</label>
                    <input type="text" name="documento" value="<?= isset($devedor) ? $devedor->getDocumento() : '' ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?= isset($devedor) ? $devedor->getNome() : '' ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" value="<?= isset($devedor) ? $devedor->getSobrenome() : '' ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" name="celular" id="celular" value="<?= isset($devedor) ? $devedor->getCelular() : '' ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" name="nascimento" value="<?= isset($devedor) ? $devedor->getNascimento() : '' ?>" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</main>