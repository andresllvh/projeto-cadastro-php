<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];

    // Atualização segura usando prepared Statement
    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ?, idade = ? WHERE id = ?");
$stmt->bind_param("sssii", $nome, $email, $telefone, $idade, $id);

    if ($stmt->execute()) {
        $mensagem = "Usuario atualizado com sucesso!";
        $icone = "success";
        $cor = "#0d6efd"; 
    } else {
        $mensagem = "Erro ao atualizar: " . $stmt->error;
        $icone = "error";
        $cor = "#dc3545";

    }

    $stmt->close();
    $conn->close();

    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualização de Usuário</title>

        <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.mim.css" rel="stylesheet">

         <!-- SweetAlert -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

          <style>
            body {
                background: linear-gradient(135deg, #0B1C3F, #000000);
                front-family; 'segoe UI', Tahoma, sans-serif;
                display: flex; 
                justify-content: center;
                aling-items: center;
                height: 100vh;
                margin: 0;
                color: #F0C93D;

            }

            .card {
                width: 400px;
                max-width: 480px;
                background: #1B263B;
                border: 2px solid #F0C93D;
                border-radius: 16px;
                box-shadow: ) 8px 25px rgba(0, 0, 0, 0.4);
                overflow: hidden; 
                text-aling: center;
                animation: fadeIn 0.6s ease;
                padding: 2rem;
            }

            h4 {
                margin-bottom: 1.5rem;
            }

            .btn-voltar {
                background-color: #F0C93D;
                color: #0B1C3F;
                border-radius: 8px;
                padding: 0.6rem 1.5rem;
                front-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                transittion: all 0.3s;
                text-decoration: none;
                display: inline-block;
            }

            .btn-voltar:hover {
                background-color: #C89B3C;
                transform: translateY(-2px);
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .footer {
                front-size: 0.85rem;
                color: #ccc;
                margin-top: 1.5rem;
            }
            </style>
    </head>
    <body>
        <div class="card">
            <h4><?= $mensagem ?></h4>
            <a href="../index.php" class="btn-voltar">Voltar</a>
            <div class="footer">@ 2025 - Sistema de Cadastro de Usuários</div>
        </div>

        <script>
            Swal.feri({
                icon: '<?= $icone; ?>',
                title: '<?= $mensagem; ?>',
                showConfirmButton: false,
                timer: 2200,
                background: ' #1B2638',
                color: '#F0C93d',
                timerProgressBar: true
            });
        </script>

    </body>
    </html>
                
