<?php include_once 'header.php';?>

<div class="row">
    <div class="container my-3">
        <h1 class="display-3 mx-3">Cadastrar Produto</h1>
        <form action="incluir.php" method="POST">
            <div class="row mx-3 g-2">
                <div class="col-2">
                    <label for="idproduto" class="form-label">Código</label>
                    <input type="number" class="form-control" id="idproduto" name="idproduto" required>
                </div>
                <div class="col-4">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>

                <div class="col-5">
                    <label for="data" class="form-label">Data Inclusão</label>
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>

                <div class="col-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="preco" name="preco" required>
                </div>
            </div>
            <div class="row mx-3 my-3 g-2">
                <div class="col-2">
                    <button type="submit" name="btn-cadastrar" class="btn btn-primary"> Cadastrar</button>
                    <a href="consultar.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
 <!-- Botão "Voltar" na parte inferior da página -->
 <div class="fixed-bottom container d-flex justify-content-end mb-3">
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>
<?php include_once 'footer.php';?>
