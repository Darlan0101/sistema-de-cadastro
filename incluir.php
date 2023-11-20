<?php
// Iniciar Sessão
session_start();

if (isset($_POST['btn-cadastrar'])) {
    // Transformar caracteres especiais em HTML
    $idproduto = filter_input(INPUT_POST, 'idproduto', FILTER_SANITIZE_NUMBER_INT);
    // Transformar caracteres especiais em HTML
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    // Remover todos os caracteres, exceto letras, números e !#$%&'*+-=?^_`{|}~@.[].
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    // Remover todos os caracteres, exceto números, sinal de mais e menos.
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);

    // Conexão
    require_once 'banco.php';

    $sql = "INSERT INTO produtos (idproduto, descricao, data, preco) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt === false) {
        $_SESSION['mensagem'] = "Erro ao preparar a declaração: " . mysqli_error($connect);
        header('Location: consultar.php?erro');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "issd", $idproduto, $descricao, $data, $preco);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['mensagem'] = "Cadastro com sucesso!";
        header('Location: consultar.php?sucesso');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($connect);
        header('Location: consultar.php?erro');
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
    exit();
}
?>
