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
           </tr>";
    }
} else {
    echo"<tr></tr> colspan='5' class='text-center text
    -muted'>Nenhum usuario cadastrado ainda.</tr>";
}

$conn->close();
?>