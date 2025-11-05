<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, telefone=?, idade=? WHERE id=?");
    $stmt->bind_param("sssii", $nome, $email, $telefone, $idade, $id);

    if ($stmt->execute()) {
        echo "
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Salvando alterações...</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

            <style>
                body {
                    background: linear-gradient(180deg, #F7F9FC 0%, #E6ECF5 100%);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    font-family: 'Inter', sans-serif;
                }

                .card-loading {
                    background: #fff;
                    border: 2px solid #0d6efd;
                    border-radius: 16px;
                    width: 360px;
                    height: 240px;
                    text-align: center;
                    box-shadow: -10px 0px 0px #0d6efd, -10px 5px 5px rgba(0, 0, 0, 0.15);
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    animation: fadeInUp 0.6s ease;
                    padding: 1.5em;
                }

                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                h2 {
                    color: #0d6efd;
                    font-weight: 700;
                    font-size: 1.3rem;
                    margin-bottom: 25px;
                    animation: pulseText 2s infinite ease-in-out;
                }

                @keyframes pulseText {
                    0%, 100% { opacity: 1; transform: scale(1); }
                    50% { opacity: 0.7; transform: scale(1.05); }
                }

                /* === Loader Nawsome Adaptado === */
                .loader {
                    position: relative;
                    width: 75px;
                    height: 90px;
                    margin: 0 auto;
                }

                .loader__bar {
                    position: absolute;
                    bottom: 0;
                    width: 10px;
                    height: 50%;
                    background: #0d6efd;
                    border-radius: 3px;
                    transform-origin: center bottom;
                    box-shadow: 0px 0px 8px rgba(13, 110, 253, 0.4);
                }

                .loader__bar:nth-child(1) {
                    left: 0px;
                    transform: scale(1, 0.2);
                    animation: barUp1 4s infinite;
                }

                .loader__bar:nth-child(2) {
                    left: 15px;
                    transform: scale(1, 0.4);
                    animation: barUp2 4s infinite;
                }

                .loader__bar:nth-child(3) {
                    left: 30px;
                    transform: scale(1, 0.6);
                    animation: barUp3 4s infinite;
                }

                .loader__bar:nth-child(4) {
                    left: 45px;
                    transform: scale(1, 0.8);
                    animation: barUp4 4s infinite;
                }

                .loader__bar:nth-child(5) {
                    left: 60px;
                    transform: scale(1, 1);
                    animation: barUp5 4s infinite;
                }

                .loader__ball {
                    position: absolute;
                    bottom: 10px;
                    left: 0;
                    width: 10px;
                    height: 10px;
                    background: #29ABFF;
                    border-radius: 50%;
                    animation: ball624 4s infinite;
                    box-shadow: 0px 0px 10px rgba(41, 171, 255, 0.7);
                }

                @keyframes ball624 {
                    0% { transform: translate(0, 0); }
                    5% { transform: translate(8px, -14px); }
                    10% { transform: translate(15px, -10px); }
                    17% { transform: translate(23px, -24px); }
                    20% { transform: translate(30px, -20px); }
                    27% { transform: translate(38px, -34px); }
                    30% { transform: translate(45px, -30px); }
                    37% { transform: translate(53px, -44px); }
                    40% { transform: translate(60px, -40px); }
                    50% { transform: translate(60px, 0); }
                    57% { transform: translate(53px, -14px); }
                    60% { transform: translate(45px, -10px); }
                    67% { transform: translate(37px, -24px); }
                    70% { transform: translate(30px, -20px); }
                    77% { transform: translate(22px, -34px); }
                    80% { transform: translate(15px, -30px); }
                    87% { transform: translate(7px, -44px); }
                    90% { transform: translate(0, -40px); }
                    100% { transform: translate(0, 0); }
                }

                @keyframes barUp1 {
                    0%,40% { transform: scale(1, 0.2); }
                    50%,90% { transform: scale(1, 1); }
                    100% { transform: scale(1, 0.2); }
                }
                @keyframes barUp2 {
                    0%,40% { transform: scale(1, 0.4); }
                    50%,90% { transform: scale(1, 0.8); }
                    100% { transform: scale(1, 0.4); }
                }
                @keyframes barUp3 { 0%,100% { transform: scale(1, 0.6); } }
                @keyframes barUp4 {
                    0%,40% { transform: scale(1, 0.8); }
                    50%,90% { transform: scale(1, 0.4); }
                    100% { transform: scale(1, 0.8); }
                }
                @keyframes barUp5 {
                    0%,40% { transform: scale(1, 1); }
                    50%,90% { transform: scale(1, 0.2); }
                    100% { transform: scale(1, 1); }
                }
            </style>
        </head>

        <body>
            <div class='card-loading'>
                <h2>Salvando alterações...</h2>
                <div class='loader'>
                    <div class='loader__bar'></div>
                    <div class='loader__bar'></div>
                    <div class='loader__bar'></div>
                    <div class='loader__bar'></div>
                    <div class='loader__bar'></div>
                    <div class='loader__ball'></div>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuário atualizado!',
                        text: 'As informações foram salvas com sucesso.',
                        confirmButtonText: 'Voltar para a lista',
                        confirmButtonColor: '#0d6efd',
                        background: '#ffffff',
                        color: '#0d6efd',
                    }).then(() => {
                        window.location.href = '../index.php';
                    });
                }, 2400);
            </script>
        </body>
        </html>
        ";
    } else {
        echo "
        <html>
        <head>
            <meta charset='UTF-8'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao atualizar!',
                    text: 'Ocorreu um problema ao tentar salvar as alterações.',
                    confirmButtonText: 'Voltar',
                    confirmButtonColor: '#d33'
                }).then(() => {
                    window.location.href = '../index.php';
                });
            </script>
        </body>
        </html>
        ";
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: ../index.php');
    exit();
}
?>