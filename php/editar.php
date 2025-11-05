<?php 
include('conexao.php');

// Verifica se há ID válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID inválido!'); window.location.href='../index.php';</script>";
    exit();
}

$id = $_GET['id'];

// Busca o usuário pelo ID
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Usuário não encontrado!'); window.location.href='../index.php';</script>";
    exit();
}

$usuario = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(180deg, #F7F9FC 0%, #E6ECF5 100%);
            font-family: "Inter", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            width: 380px;
            border: 2px solid #0d6efd;
            border-radius: 1.5em;
            padding: 2em;
            box-shadow: -10px 0px 0px #0d6efd, -10px 5px 5px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .form:hover {
            transform: translateY(-3px);
            box-shadow: -12px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 1.8em;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 0.5em;
        }

        label {
            position: relative;
            width: 100%;
            margin-bottom: 1em;
        }

        .input {
            width: 100%;
            border: 2px solid #0d6efd;
            border-radius: 0.5em;
            padding: 0.8em 1em;
            font-size: 0.95em;
            color: #212529;
            background-color: transparent;
            outline: none;
            transition: all 0.3s ease;
        }

        label span {
            position: absolute;
            left: 1em;
            top: 0.8em;
            color: #6c757d;
            font-size: 0.9em;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input:focus + span,
        .input:valid + span {
            top: -10px;
            left: 12px;
            background-color: #fff;
            font-size: 0.75em;
            color: #0d6efd;
            padding: 0 5px;
        }

        .animated-button {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 8px;
            height: 45px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .animated-button:hover {
            background-color: #004de0;
            transform: scale(1.03);
        }

        .btn-secondary {
            background-color: #E5E7EB;
            color: #111827;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            width: 90%;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 10px;
}

.btn-secondary:hover {
  background-color: #D1D5DB;
  transform: scale(1.03);
  text-decoration: none;
}


        .animated-button svg {
            height: 20px;
            fill: currentColor;
            transition: all 0.3s ease;
        }

        .animated-button .arr-1 {
            transform: translateX(-120%);
            opacity: 0;
        }

        .animated-button:hover .arr-1 {
            transform: translateX(0);
            opacity: 1;
        }

        .animated-button:hover .arr-2 {
            transform: translateX(120%);
            opacity: 0;
        }

        .animated-button .circle {
            position: absolute;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            border-radius: 8px;
        }

        .animated-button:hover .circle {
            width: 100%;
        }
    </style>
</head>

<body>
    <form class="form" action="atualizar.php" method="POST">
        <p class="title">Editar Usuário</p>

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>
            <input required type="text" class="input" name="nome" value="<?= htmlspecialchars($usuario['nome']); ?>">
            <span>Nome Completo</span>
        </label>

        <label>
            <input required type="email" class="input" name="email" value="<?= htmlspecialchars($usuario['email']); ?>">
            <span>E-mail</span>
        </label>

        <label>
            <input required type="tel" class="input" name="telefone" value="<?= htmlspecialchars($usuario['telefone']); ?>">
            <span>Telefone</span>
        </label>

        <label>
            <input required type="number" class="input" name="idade" value="<?= htmlspecialchars($usuario['idade']); ?>">
            <span>Idade</span>
        </label>
        <div class="d-flex w-100 justify-content-center">
             <a href="../index.php" class="btn-secondary text-center">Voltar</a>
            </div>
        <button type="submit" class="animated-button mt-2">
            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
            </svg>
            <span class="text">Salvar Alterações</span>
            <span class="circle"></span>
            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
            </svg>
        </button>
    </form>
</body>
</html>
