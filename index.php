    <!--
        Projeto Prático - Programação Web
        Sistema de Cadastro de Usuários
        Desenvolvido por: André Laureano e Felipe Gabriel
        Este arquivo contém a interface principal do sistema (formulário e listagem)
    -->

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Cadastro de Usuários</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

    <header class="bg-primary text-white text-center py-4 mb-4">
        <div>
            <h1 class= "mb-0">Sistema de Cadastro de Usuários</h1>
            <p class="mb-0">Projeto Prático - Programação Web (ADS)</p>
        </div>
        </header>

        <!-- Conteúdo principal -->
    <main class="container">

        <!-- Formulário de Cadastro -->
        <section class="card shadow-sm mb-5">
            <div class="card-header bg-primary text-white">
                <h2 class="h4 mb-0">Cadastrar Novo Usuário</h2>
            </div>

            <div class="card-body">
                <form action="php/inserir.php" method="POST" id="formCadastro">

                    <!-- Campo Nome -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite o nome completo">
                    </div>

                    <!-- Campo E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@email.com">
                    </div>

                    <!-- Campo Telefone -->
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" required placeholder="(00) 00000-0000">
                    </div>

                    <!-- Campo Idade -->
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input type="number" class="form-control" id="idade" name="idade" min="1" max="120" required placeholder="Digite a idade">
                    </div>

                    <!-- Botão de envio -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar Cadastro</button>
                    </div>
                </form>
            </div>
            </section>

            <!-- Tabela de usuários cadastrados -->
        <section class="card shadow-sm mb-5">
            <div class="card-header bg-success text-white">
                <h2 class="h4 mb-0">Usuários Cadastrados</h2>
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
                            <!-- Aqui serão exibidos os usuários cadastrados que vêm do banco -->
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Nenhum usuário cadastrado ainda.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class= "mb-0">Desenvolvido por André Laureano e Felipe Gabriel | ADS - 2025</p>
        </div>
    </footer>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>