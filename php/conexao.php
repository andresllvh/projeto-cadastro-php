<?php
// conexao.php
// Arquivo responsável por conectar o sistema ao banco de dados MySQL (XAMPP)
// Desenvolvido por André Laureano e Felipe Gabriel

$servidor = "localhost";
$usuario = "root"; // padrão do XAMPP
$senha = ""; // sem senha no XAMPP
$banco = "cadastro_usuarios"; // nome do banco que você criou no phpMyAdmin

// Cria a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu certo
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Caso contrário:
echo " Conexão com o banco realizada com sucesso!";
?>