<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Usuários</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="css/style.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Cabeçalho -->
    <header class="bg-primary text-white text-center py-4 mb-4">
        <div>
            <h1 class="mb-0">💪 Iron Force Academia</h1>
            <p class="mb-0">Sistema de Gestão de Alunos</p>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="container d-flex flex-column align-items-center">

        <!-- Formulário Animado -->
        <form class="form" action="php/inserir.php" method="POST">
            <p class="title">Novo Aluno</p>
            <p class="message">Preencha os campos para cadastrar um novo aluno.</p>

            <!-- Campo Nome Completo -->
            <label>
                <input required type="text" class="input" name="nome">
                <span>Nome do Aluno</span>
            </label>

            <!-- Campos Idade e Telefone lado a lado -->
            <div class="flex">
                <label>
                    <input required type="number" class="input" name="idade" min="1" max="120">
                    <span>Idade</span>
                </label>
                <label>
                    <input required type="tel" class="input" name="telefone">
                    <span>Telefone</span>
                </label>
            </div>

            <!-- Campo E-mail -->
            <label>
                <input required type="email" class="input" name="email">
                <span>E-mail</span>
            </label>

            <!-- Botão animado -->
            <button type="submit" class="animated-button">
                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
                <span class="text">Cadastrar Aluno</span>
                <span class="circle"></span>
                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </button>
        </form>

        <!-- Tabela de Usuários -->
        <section class="card shadow-sm mb-5 mt-5 w-100">
            <div class="card-header bg-success text-white">
                <h2 class="h4 mb-0">Alunos Cadastrados</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Idade</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('php/conexao.php');
                                $sql = "SELECT * FROM usuarios ORDER BY id DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$row['id']}</td>
                                                <td>{$row['nome']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['telefone']}</td>
                                                <td>{$row['idade']}</td>
                                                <td class='text-center'>
                                                    <a href='php/editar.php?id={$row['id']}' class='btn btn-warning btn-sm me-2'>Editar</a>
                                                    <button class='btn btn-danger btn-sm' onclick='confirmarExclusao({$row['id']})'>
                                                        Excluir
                                                    </button>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr>
                                            <td colspan='6' class='text-center text-muted py-4'>
                                                Nenhum usuário cadastrado ainda.
                                            </td>
                                        </tr>";
                                }

                                $conn->close();
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3 mt-5 w-100">
        <div class="container">
            <p class="mb-0">© 2025 Iron Force Academia - Desenvolvido por André Laureano e Felipe Gabriel | ADS</p>
        </div>
    </footer>

    <!-- Script de Confirmação (SweetAlert Animado) -->
    <script>
    function confirmarExclusao(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Deseja realmente excluir este aluno?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar',
            background: '#ffffff',
            color: '#0d6efd',
            backdrop: `
                rgba(13,110,253,0.1)
                left top
                no-repeat
            `,
            showClass: { popup: 'animate__animated animate__zoomIn' },
            hideClass: { popup: 'animate__animated animate__zoomOut' }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'php/excluir.php?id=' + id;
            }
        });
    }
    </script>

</body>
</html>
