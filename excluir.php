<?php
if (isset($_GET['idproduto'])) {
    $idproduto = filter_var($_GET['idproduto'], FILTER_SANITIZE_NUMBER_INT);

    // Conexão
    require_once 'banco.php';

    // Preparar e executar a declaração SQL
    $sql = "DELETE FROM produtos WHERE idproduto=?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt === false) {
        echo 'Erro na preparação da declaração: ' . mysqli_error($connect);
        die();
    }

    mysqli_stmt_bind_param($stmt, "i", $idproduto);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
        echo "Exclusão bem-sucedida!";
        header('Location: consultar.php?excluir=ok');
        exit();
    } else {
        echo 'Erro ao executar a declaração: ' . mysqli_error($connect);
        header('Location: consultar.php?excluir=erro');
        exit();
    }
} else {
    echo 'ID do produto não fornecido.';
}
?>







