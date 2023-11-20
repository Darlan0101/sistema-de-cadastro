<?php
//Conexão com banco de dados
$servername = "localhost"; //endereço do servidor
$username="root";
$password="aluno";
$db_name="crud";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);



if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;
?>