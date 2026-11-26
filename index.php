<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Define a codificação de caracteres como UTF-8 para suporte a acentos e caracteres especiais -->
    <meta charset="UTF-8">
    <!-- Configura a viewport para garantir responsividade em telas de dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas :: Gerenciamento</title>

    <?php
    // Inclui o arquivo de referências (conexão com o banco de dados, Bootstrap e folha de estilo CSS)
    include "referencias.php";
    ?>
</head>

<body>
    <!-- Elemento semântico principal que agrupa o menu do sistema, utilizando a classe de fundo claro do Bootstrap -->
    <main class="bg-light">

        <!-- --- OPÇÕES DO MENU DE NAVEGAÇÃO --- -->

        <!-- Opção 1: Redireciona para o formulário de cadastro de novas tarefas -->
        <div class="item bg-gradient">
            <a href="tarefa_marcar.php">Marcar tarefa</a>
        </div>

        <!-- Opção 2: Redireciona para a página de listagem das tarefas existentes -->
        <div class="item bg-gradient">
            <a href="tarefa_listar.php">Listar tarefas</a>
        </div>

        <!-- Opção 3: Redireciona para a página de busca por ID de tarefa -->
        <div class="item bg-gradient">
            <a href="tarefa_pesquisar.php">Pesquisar tarefas</a>
        </div>

    </main>

</body>

</html>