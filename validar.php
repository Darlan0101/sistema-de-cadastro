<?php
// Função para validar o login
function validaLogin($email, $senha) {
    // Define o e-mail e senha válidos
    $emailValido = 'darlandbo@hotmail.com';
    $senhaValida = '123';

    // Verifica se o e-mail e a senha correspondem aos valores válidos
    if ($email === $emailValido && $senha === $senhaValida) {
        return true; 
    } else {
        return false; 
    }
}
?>
