<?php 
// Conexão
include_once 'banco.php';

// Header
include_once 'header.php';
?>

<!-- BOOTSTRAP -->
<div class="m-5">
    <div class="fs-1 mb-5">
        <h1>Lista de Produtos</h1>
    </div>

    <!-- Formulário de Pesquisa -->
    <div class="mb-3">
        <form action="consultar.php" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar produto..." name="q">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>

    <div class="table-responsive">            
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">DATA DE INCUSÃO</th>
                    <th scope="col">PREÇO</th>                   
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                // Verifica se o parâmetro de pesquisa está presente na URL
                if (isset($_GET['q']) && !empty($_GET['q'])) {
                    $pesquisa = mysqli_real_escape_string($connect, $_GET['q']);
                    $sql = "SELECT * FROM produtos WHERE descricao LIKE '%$pesquisa%' OR data LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%'";
                } else {
                    $sql = "SELECT * FROM produtos";
                }

                $resultado = mysqli_query($connect, $sql);

                if (mysqli_num_rows($resultado) > 0):
                    while ($linha = mysqli_fetch_array($resultado)):
                ?>                            
                    <tr>
                        <td> <?php echo $linha['idproduto']; ?> </td>
                        <td> <?php echo $linha['descricao']; ?> </td>
                        <td> <?php echo $linha['data']; ?> </td>
                        <td> <?php echo $linha['preco']; ?>  </td>                            
                        <td>    
                            <a href='editar.php?idproduto=<?php echo $linha['idproduto'];?>' class="btn btn-sm btn-warning"> 
                                Editar
                            </a>
                            
                            <!-- O atributo  data-bs-toggle pode ser modal ou popover. -->
                            <a href='excluir.php?idproduto=<?php echo $linha['idproduto'];?>' class="btn btn-sm btn-danger"  data-bs-toggle='modal' data-bs-target="#exampleModal<?php echo $linha['idproduto'];?>"> 
                                Excluir
                            </a>                              
                        </td>
                    </tr>

                    <!--Modal-->
                    <div class='modal fade' id="exampleModal<?php echo $linha['idproduto'];?>" tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>

                                <div class='modal-header bg-danger text-white'>
                                    <h1 class='modal-title fs-5 ' id='exampleModalLabel'>ATENÇÃO!</h1>
                                    <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>

                                <div class='modal-body mb-3 mt-3'>
                                    Tem certeza que deseja <b>EXCLUIR</b> o produto <?php echo $linha['idproduto'];?>?
                                </div>

                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                                    <a href="excluir.php?idproduto=<?php echo $linha['idproduto'];?>" type='button' class='btn btn-danger'>Sim, quero!</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td></td>
                    </tr>
                <?php endif; ?>                  
            </tbody> 
        </table>
    </div>

    <!-- Botão "Voltar" na parte inferior da página -->
    <div class="fixed-bottom container d-flex justify-content-end mb-3">
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>

    <a href="adicionarprodutos.php" class="btn btn-primary"> Adicionar produtos</a>
</div>

<?php include_once 'footer.php';?>



 
