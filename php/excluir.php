<?php
/*
Arquivo: excluir.php
Descrição: Exclui um usuário do banco de dados
Desenvolvido por: André Laureano e Felipe Gabriel
Disciplina: Programação Web
*/

include('conexao.php');

// Verifica se o ID do usuário foi fornecido via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); //Garante que é um número inteiro

    //Prepara o comando SQL com prepared statement(seguro)
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i",$id);

    //Executa a exclusão
    if($stmt->execute()) {
        // Redireciona de volta para a página principal após a exclusão
        header("Location: ../index.php?msg=excluido");
        exit();
    } else {
        echo "<h3 style='color:red;'> erro ao excluir usuário:" . 
        htmlspecialchars($stmt->error)."</h3>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p> Nenhum ID informado para exclusão.</p>";
}

?>