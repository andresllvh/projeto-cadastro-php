<?php
include('conexao.php');

$sql ="SELECT * FROM  usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída de dados de cada linha
    while($row = $result->fetch_assoc()){
        echo "<tr>
                 <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
                <td>{$row['idade']}</td>
                <td class='text-center'>
                    <a href='php/excluir.php?id={$row['id']}'
                    class='btn btn-sm btn-danger'
                    onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">
                    excluir
                  </a>
                </td>
             </tr>";
    }
} else {
    echo "<tr>
        <td colspan='6' class='text-center text-muted py-3'>
        Nenhum usuario cadastrado ainda.
        </td>
    </tr>";
}

$conn->close();
?>