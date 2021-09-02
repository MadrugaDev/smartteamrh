<main>
    <section class="bg-dark text-light p-3">
        <a href="titulos.php?devedor=<?= $IdDevedor ?>">
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
                <label>Descricao</label>
                <input type="text" name="descricao" value="<?= isset($titulo) ? $titulo->getDescricao() : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Valor</label>
                <input type="text" name="valor" value="<?= isset($titulo) ? $titulo->getValor() : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Vencimento</label>
                <input type="date" name="vencimento" value="<?= isset($titulo) ? $titulo->getVencimento() : '' ?>" class="form-control">
            </div>


            <div class="form-group">
                <label>Situação</label>
                <div>
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" value="0" checked> Em Aberto
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="status" value="1" <?= isset($titulo) && $titulo->getStatus() == '1' ? 'checked' : '' ?>> Pago
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>    
</main>
