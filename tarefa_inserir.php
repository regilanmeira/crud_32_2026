<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Define a codificação de caracteres como UTF-8 para suporte a acentos e caracteres especiais -->
    <meta charset="UTF-8">
    <!-- Configura a viewport para garantir responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Marcar</title>

    <?php
    // Inclui o arquivo de referências (com os links CSS/JS externos e Bootstrap) no cabeçalho do documento
    include "referencias.php"
    ?>
</head>

<body>
    <br>
    <?php

    // --- 1. CAPTURA DOS DADOS ENVIADOS PELO FORMULÁRIO ---
    // Recebe os valores enviados via método POST dos campos do formulário anterior
    $descricao = $_POST["txtDescricao"];
    $data_entrega = $_POST["txtData"];
    $prioridade = $_POST["txtPrioridade"];
    $responsavel = $_POST["txtResponsavel"];

    // --- 2. PREPARAÇÃO DA INSTRUÇÃO SQL ---
    // Prepara a consulta SQL de inserção (INSERT) utilizando Prepared Statements (?) para evitar SQL Injection.
    // A variável $conexao deve ter sido estabelecida no conexao_bd.php (ou dentro de referencias.php)
    $sql = $conexao->prepare("INSERT INTO tarefa (descricao, data_entrega, prioridade,responsavel) VALUES (?, ?, ?, ?)");

    // --- 3. VINCULAÇÃO DOS PARÂMETROS ---
    // Vincula as variáveis locais aos placeholders ('?') da consulta preparada.
    // O primeiro argumento "ssss" indica que os 4 parâmetros são do tipo String (texto)
    $sql->bind_param("ssss", $descricao, $data_entrega, $prioridade, $responsavel);

    // --- 4. EXECUÇÃO E RETORNO AO USUÁRIO ---
    // Executa a instrução preparada no banco de dados e verifica se a operação foi bem-sucedida
    if ($sql->execute()) {
        // Exibe mensagem de sucesso formatada com a classe de alerta verde do Bootstrap
        echo "<h1 class='alert alert-success'>Nova tarefa criado com sucesso!</h1>";
    } else {
        // Exibe mensagem de erro formatada com a classe de alerta vermelha do Bootstrap
        echo "<h1 class='alert alert-danger'>Erro ao inserir o registro:</h1> ";
    }

    ?>

    <!-- --- 5. NAVEGAÇÃO --- -->
    <!-- Botão de navegação para retornar à página principal (index.php) -->
    <a href="index.php">
        <button type="button" class="btn btn-danger" name="btVoltar">
            Voltar
        </button>
    </a>
</body>

</html>