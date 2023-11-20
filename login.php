<?php
include_once 'header.php';
include_once 'validar.php';

session_start();

if (isset($_POST['btlogin'])) {
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];

    // Conexão com o banco de dados 
    include_once 'banco.php';

    
    $sql = "SELECT idusuario, email, senha FROM usuario WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        
        mysqli_stmt_bind_result($stmt, $idusuario, $db_email, $db_senha);

        
        mysqli_stmt_fetch($stmt);

        // Verifica se as credenciais são válidas
        if ($db_email === $email && md5($senha) === $db_senha) {
            // Credenciais válidas, configura a variável de sessão
            $_SESSION['authenticated'] = true;
            $_SESSION['idusuario'] = $idusuario;

            // Redireciona para a página de consulta
            header("Location: consultar.php");
            exit();
        } else {
            echo "Login inválido. Verifique suas credenciais.";
        }

        // Feche a declaração
        mysqli_stmt_close($stmt);
    } else {
        echo 'Erro na preparação da declaração: ' . mysqli_error($connect);
    }

    // Feche a conexão
    mysqli_close($connect);
}
?>

<link rel="stylesheet" href="css/login.css">

<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Autenticação do usuário</h3>
            <div class="card-text">
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="txtemail">Email:</label>
                        <input type="email" class="form-control form-control-sm" name="txtemail" required>
                    </div>
                    <div class="form-group">
                        <label for="txtsenha">Senha:</label>
                        <input type="password" class="form-control form-control-sm" name="txtsenha" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block" name="btlogin">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>



