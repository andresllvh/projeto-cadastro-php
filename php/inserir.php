<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, idade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $idade);

    if ($stmt->execute()) {
        $mensagem = "Usuário cadastrado com sucesso!";
        $status = "success";
    } else {
        $mensagem = "Erro ao cadastrar: " . $stmt->error;
        $status = "error";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultado do Cadastro</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* ---------- RESET ---------- */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #eef3ff 0%, #ffffff 100%);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ---------- CARD ---------- */
    .card {
        width: 100%;
        max-width: 420px;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(13, 110, 253, 0.15);
        text-align: center;
        padding: 30px;
        animation: fadeIn 0.6s ease;
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        padding: 15px;
        border-radius: 15px 15px 0 0;
    }

    .circle {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: rgba(255,255,255,0.7);
        animation: pulse 1s infinite alternate;
    }

    @keyframes pulse {
        from { transform: scale(0.9); opacity: 1; }
        to { transform: scale(1.5); opacity: 0.5; }
    }

    .card-body h4 {
        color: #198754;
        font-weight: 600;
        margin-top: 15px;
    }

    /* ---------- BOTÃO ---------- */
    .btn-voltar {
        background-color: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: 20px;
        display: inline-block;
        text-decoration: none;
    }

    .btn-voltar:hover {
        background-color: #0a58ca;
        transform: translateY(-2px);
    }

    /* ---------- ANIMAÇÃO ---------- */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .footer {
        font-size: 0.85rem;
        color: #777;
        margin-top: 20px;
    }

    /* ---------- ÍCONE DE SUCESSO ---------- */
    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        background: #4CAF50;
        margin-top: 10px;
    }

    .checkmark::after {
        content: "";
        position: absolute;
        left: 18px;
        top: 12px;
        width: 10px;
        height: 20px;
        border-right: 3px solid #fff;
        border-bottom: 3px solid #fff;
        transform: rotate(45deg);
        animation: check 0.4s ease forwards;
    }

    @keyframes check {
        from { opacity: 0; transform: rotate(45deg) scale(0.5); }
        to { opacity: 1; transform: rotate(45deg) scale(1); }
    }
</style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <div class="circle"></div>
        <span>Resultado do Cadastro</span>
    </div>

    <div class="card-body">
        <?php if ($status === "success"): ?>
            <div class="checkmark"></div>
        <?php endif; ?>

        <h4><?= $mensagem; ?></h4>
        <a href="../index.php" class="btn-voltar">Voltar</a>
        <div class="footer">© 2025 - Sistema de Cadastro de Usuários</div>
    </div>
</div>

<script>
Swal.fire({
    icon: '<?= $status; ?>',
    title: '<?= $mensagem; ?>',
    showConfirmButton: false,
    timer: 2000,
    background: '#ffffff',
    color: '#0d6efd',
    timerProgressBar: true
});
</script>

</body>
</html>
