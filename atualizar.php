<?php
if(isset($_POST['btn-atualizar'])) {
    $idproduto = filter_var($_POST['idproduto'], FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
    $data = $_POST['data'];
    $preco = filter_var($_POST['preco'], FILTER_SANITIZE_NUMBER_FLOAT);

    // Conexão
    require_once 'banco.php';

    $sql = "UPDATE produtos SET descricao=?, data=?, preco=? WHERE idproduto=?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt === false) {
        echo 'Erro na preparação da declaração: ' . mysqli_error($connect);
        die();
    }

    mysqli_stmt_bind_param($stmt, "ssdi", $descricao, $data, $preco, $idproduto);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
        echo "Atualização bem-sucedida!";
        header('Location: consultar.php?atualizar=ok');
        exit();
    } else {
        echo 'Erro ao executar a declaração: ' . mysqli_error($connect);
        header('Location: consultar.php?atualizar=erro');
        exit();
    }
}
?>



