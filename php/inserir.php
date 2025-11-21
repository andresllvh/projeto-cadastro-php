<?php
include('conexao.php');

// Evita warnings
$status = null;
$mensagem = null;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $idade = intval($_POST['idade']);

    if (!empty($nome) && !empty($email) && !empty($telefone) && $idade > 0) {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, idade) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nome, $email, $telefone, $idade);

        if ($stmt->execute()) {
            $status = "success";
            $mensagem = "Usuário cadastrado com sucesso!";
        } else {
            $status = "error";
            $mensagem = "Erro ao cadastrar o usuário.";
        }

        $stmt->close();
    } else {
        $status = "error";
        $mensagem = "Por favor, preencha todos os campos corretamente.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvando Usuário...</title>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(180deg, #F7F9FC 0%, #E6ECF5 100%);
            font-family: "Inter", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .loader {
            position: relative;
            width: 75px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bars {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 4px;
        }

        .loader__bar {
            width: 10px;
            height: 20px;
            background: #0d6efd;
            transform-origin: center bottom;
            animation: barWave 1.2s infinite ease-in-out;
        }

        .loader__bar:nth-child(1) { animation-delay: 0s; }
        .loader__bar:nth-child(2) { animation-delay: 0.1s; }
        .loader__bar:nth-child(3) { animation-delay: 0.2s; }
        .loader__bar:nth-child(4) { animation-delay: 0.3s; }
        .loader__bar:nth-child(5) { animation-delay: 0.4s; }

        .loader__ball {
            position: absolute;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 100%);
            width: 12px;
            height: 12px;
            background: #29ABE2;
            border-radius: 50%;
            animation: ballBounce 1.2s infinite ease-in-out;
        }

        @keyframes barWave {
            0%, 100% { transform: scaleY(0.3); }
            50% { transform: scaleY(1); }
        }

        @keyframes ballBounce {
            0%, 100% { transform: translate(-50%, 100%); }
            50% { transform: translate(-50%, -40%); }
        }
    </style>
</head>

<body>
    <div class="loader">
        <div class="bars">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
        </div>
        <div class="loader__ball"></div>
    </div>

    <?php if ($status): ?>
        <script>
            setTimeout(() => {
                Swal.fire({
                    icon: '<?= $status == "success" ? "success" : "error" ?>',
                    title: '<?= $status == "success" ? "Sucesso!" : "Erro!" ?>',
                    text: '<?= $mensagem ?>',
                    confirmButtonColor: '#0d6efd',
                    background: '#fff',
                    color: '#0d6efd',
                }).then(() => {
                    window.location.href = '../index.php';
                });
            }, 900);
        </script>
    <?php else: ?>
        <script>
            // Se o usuário abrir diretamente, redireciona para o formulário
            setTimeout(() => {
                window.location.href = '../index.php';
            }, 1000);
        </script>
    <?php endif; ?>
</body>
</html>