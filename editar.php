<?php
//Header
include_once 'header.php';

//Select com o id que veio da URL
if(isset($_GET['idproduto'])):
    
    include_once 'banco.php';
    $idproduto = filter_var($_GET['idproduto'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM produtos WHERE idproduto = '$idproduto'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="container my-3">
    <h1 class="display-5">Atualizar Produto</h1>
    <form action="atualizar.php" method="POST">
        <div class="row gx-2">
            <div class="col-md-2">
                <label for="idproduto" class="form-label">Código</label>
                <input type="number" name="idproduto" id="idproduto" class="form-control" value="<?php echo $dados['idproduto']; ?>" readonly>
            </div>

            <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" value="<?php echo $dados['descricao']; ?>">
            </div>

            <div class="col-md-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="<?php echo $dados['data']; ?>">
            </div>

            <div class="col-md-2">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" name="preco" id="preco" class="form-control" value="<?php echo $dados['preco']; ?>">
            </div>

            <div class="col-md-1">
                
            </div>

            <div class="col-md-2 my-3">
                <button type="submit" name="btn-atualizar" class="btn btn-primary">Atualizar</button>
                <a href="consultar.php" class="btn btn-secondary">Lista de produtos</a>
            </div>
        </div>
    </form>
</div>
 <!-- Botão "Voltar" na parte inferior da página -->
 <div class="fixed-bottom container d-flex justify-content-end mb-3">
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>

<?php include_once 'footer.php';?>

