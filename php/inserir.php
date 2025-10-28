<?php
// inserir.php
// Lógica responsável por inserir os dados do formulário no banco de dados

include('conexao.php');

// Verifica se o formulário foi enviado
if($_SERVER["REQUEST_METHOD"] == "POST") {


    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];

    // 1. Prepara o comando SQL com marcadores '?'
    // Isso impede SQL Injection
    $stmt = $conn->prepare("INSERT INTO usuarios(nome,email,telefone,idade)VALUES(?,?,?,?)");
   
    // 2. Vincula (bind) as variáveis aos marcadores '?'
    //'sssi'informa ao banco os tipos dos dados:
    // s = string(para nome)
    // s = string(para email)
    // s = string(para telefone)
    // i = integer(para idade)
    $stmt->bind_param("sssi",$nome,$email,$telefone,$idade);

    // 3. Executa o comando preparado
    if($stmt->execute()){
        echo "<h3 style='color:green;'> Usuário cadastrado com sucesso!</h3>";
        echo "<a href='../index.php'> Voltar</a>";
    }else{
        // Mostrar o erro do "statement" preparado
        echo"<h3 style='color:red;'> Erro ao cadastrar:". $stmt->error."</h3>";
    }

    // 4. Fecha o statement e a conexão
    $stmt->close() ;
    $conn->close() ; 
} else {
    echo "<p>Nenhum dado enviado.</p>";
}
?>
    

