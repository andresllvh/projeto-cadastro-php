<?php 
include('conexao.php');

//Verifiacr se foi passado um ID na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "script>;
    exit()";
}
$id = $_GET['id'];

// Busca os dados do usuário pelo ID
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

//Verifica se o usuário existe
if ($result->num_rows === 0) {
    echo "<script>
            alert('Usuário não encontrado.');
            window.location.href = '../index.php';
            </script>";
    
    exit;
}

$usuario = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- boqtstrap -->
     <link href="https://cdn.jsdelvr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.css" rel="stylesheet">

     <!-- SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            body {
                background: linear-gradient(135deg, #0B1C3F, #000000);
                front-family; 'segoe UI', Tahoma, sans-serif;
                color: #F0C93D;
                min-height: 100vh;
                display: flex;
                justify-content; center;
                align-items; center;
                margin: 0;
            
            }

            .card {
                background-color: #1B263B;
                border: 2px solid #F0C93D;
                border-radius: 16px;
                width: 100%;
                max-width: 500px;
                padding: 2rem;
                box-shadom 0 8px 25px rgba(0,0,0,0.4);
                animation: fadeIn 0.6 ease-in-out;
            }

            .frorm-control {
                bacground-color: #E9ECEF;
                border: none;
                border-radius: 8px;
                padding: 0.75rem;
                margin-botto,: 1rem;

            }

            .btn-primary {
                background-color: #F0C93D;
                color: #0B1C3F;
                font-weight: 600;
                border: none;
                border-radius: 8px;
                width: 100%;
                padding: 0.75rem;
                transition: all 0.3s ease;
            }

            .btn-primary: hover {
                background-collor: #C89B3C;
                transform: translateY(-2px);
            }

            @keyframes fadeln {
                to{
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            </style>
            </head>
            <body>
                <div class="card">
                    <div class="card-header"Editar Usuário</div>
                    <form action="atualizar.php" method="POST">
                        <input type="hidden" name="id" value="<?=$usuario['id']?>">

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" 
                            value="<?= htmlspecialchars($usuario['nome']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                            value="<?=htmlspecialchars($usuario['email'])?>" <required>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                 <input type="tel" class="form-control" id="telefone" name="telefone" 
                                 value="<?= htmlspecialchars($usuario['telefone']); ?>" required>
                            </div>

                        <div class="mb-3">
                            <label for="idade" class="form-label">Idade</label>
                            <input type="number" name="idade" id"idade" class="form-control"
                            value="<?=htmlspecialchars($usuario['idade'])?>" <required>>
                        </div>

                        <div class+"d-flex justify-content-between">
                            <a href="../index.php" class="btn btn-secondary">Voltar</a>
                           <button type="submit" class="btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </body>
        </html>