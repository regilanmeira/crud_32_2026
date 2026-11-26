<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <br>
    <?php
    // --- 1. INICIALIZAÇÃO DE VARIÁVEIS ---
    // Define as variáveis com valores vazios para evitar avisos (Notices) no PHP caso o registro não seja encontrado
    $id = "";
    $descricao = "";
    $data_entrega = "";
    $prioridade = "";
    $responsavel = "";

    // --- 2. CAPTURA DOS DADOS ENVIADOS ---
    // Captura o ID da tarefa enviado via método POST (formulário anterior)
    $id = $_POST["txtId"];

    // --- 3. PREPARAÇÃO E EXECUÇÃO DA CONSULTA SQL ---
    // Prepara a instrução SQL com um placeholder (?) para evitar ataques de SQL Injection
    // A variável $conexao deve ter sido instanciada no arquivo conexao_bd.php (incluído previamente)
    $sql = $conexao->prepare("SELECT * FROM tarefa WHERE id = ?");

    // Vincula o valor da variável $id ao parâmetro '?'
    // O tipo 'i' indica que o parâmetro é um número inteiro (Integer)
    $sql->bind_param("i", $id);

    // Executa a consulta no banco de dados
    $sql->execute();

    // Obtém o conjunto de resultados (result set) da consulta executada
    $resultado = $sql->get_result();

    // --- 4. PROCESSAMENTO DOS RESULTADOS ---
    // Verifica se a consulta retornou ao menos 1 registro
    if ($resultado->num_rows > 0) {
        // Extrai os dados da linha retornada como um array associativo
        $registro = $resultado->fetch_assoc();

        // Atribui os dados vindo do banco às variáveis locais que preencherão o formulário
        $descricao = $registro["descricao"];
        $data_entrega = $registro["data_entrega"];
        $prioridade = $registro["prioridade"];
        $responsavel = $registro["responsavel"];
    } else {
        // Mensagem exibida se nenhum registro for encontrado para o ID fornecido
        echo "Nenhum registro encontrado com o ID fornecido.";
    }
    ?>

    <!-- --- 5. INTERFACE DO USUÁRIO (FORMULÁRIO DE EDIÇÃO) --- -->
    <form method="post">
        <!-- Estrutura de grid usando classes do Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Tarefa :: Editar</h2>

                    <!-- Campo: Descrição -->
                    <div class="form-group">
                        <label>Descrição</label>
                        <!-- O valor pré-carregado no input vem da variável PHP $descricao -->
                        <input type="text" class="form-control" required="" placeholder="Descricao da tarefa"
                            name="txtDescricao" value="<?php echo $descricao ?>">
                    </div>

                    <!-- Campo: Data de Entrega -->
                    <div class="form-group">
                        <label>Data</label>
                        <!-- Input do tipo date para seleção de calendário -->
                        <input type="date" class="form-control" required="" name="txtData"
                            value="<?php echo $data_entrega ?>">
                    </div>

                    <!-- Campo: Prioridade -->
                    <div class="form-group">
                        <label>Prioridade</label>
                        <select name="txtPrioridade" class="form-control">
                            <!-- Compara o valor vindo do banco ($prioridade) com a opção e adiciona o atributo 'selected' no item correspondente -->
                            <option <?php if ($prioridade == 'Alta') echo 'selected'; ?> value="Alta">Alta</option>
                            <option <?php if ($prioridade == 'Média') echo 'selected'; ?> value="Média">Média</option>
                            <option <?php if ($prioridade == 'Baixa') echo 'selected'; ?> value="Baixa">Baixa</option>
                        </select>
                    </div>

                    <!-- Campo: Responsável -->
                    <div class="form-group">
                        <label>Responsável</label>
                        <input type="text" class="form-control" placeholder="Responsável pela tarefa"
                            name="txtResponsavel" value="<?php echo $responsavel ?>">
                    </div>

                    <br>

                    <!-- --- 6. BOTÕES DE AÇÃO --- -->
                    <div class="form-group">

                        <!-- Botão Editar: Envia os dados do formulário para o arquivo tarefa_atualizar.php passando o ID na URL -->
                        <button type="submit" class="btn btn-primary" name="btEditar" formaction="tarefa_atualizar.php?id=<?php echo $id ?>">
                            Editar
                        </button>

                        <!-- Botão Excluir: Executa uma confirmação via JavaScript antes de redirecionar para tarefa_deletar.php -->
                        <button onclick="return confirm('Tem certeza que deseja excluir este registro?');" type="submit" class="btn btn-warning" name="btExcluir" formaction="tarefa_deletar.php?id=<?php echo $id ?>">
                            Excluir
                        </button>

                        <!-- Botão Voltar: Redireciona o usuário de volta à tela principal (index.php) sem submeter o formulário -->
                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">
                                Voltar
                            </button>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </form>

</body>

</html>