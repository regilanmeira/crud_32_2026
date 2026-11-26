<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Configuração de codificação de caracteres para aceitar acentuação em português -->
    <meta charset="UTF-8">
    <!-- Ajuste da área de exibição (viewport) para garantir responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas :: Listar</title>

    <?php
    // Inclui o arquivo de referências que contém os arquivos CSS/JS externos e Bootstrap
    include "referencias.php";
    ?>

</head>

<body>
    <!-- Formulário estrutural (não possui ação direta pois é apenas uma listagem) -->
    <form action="" method="post">
        <!-- Container principal do Bootstrap para centralizar e alinhar o conteúdo -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <br>
                    <h2>Tarefas :: Listar</h2>
                    <br>

                    <div class="form-group">
                        <!-- Início da tabela HTML para exibição dos registros -->
                        <table>

                            <!-- Cabeçalho da tabela com os nomes das colunas -->
                            <tr>
                                <th>Id</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Prioridade</th>
                                <th>Responsável</th>
                            </tr>

                            <?php
                            // --- 1. PREPARAÇÃO DA CONSULTA SQL ---
                            // Prepara a instrução para buscar todas as tarefas ordenadas pela data de entrega da mais recente para a mais antiga (DESC)
                            $sql = $conexao->prepare("SELECT * FROM tarefa ORDER BY data_entrega DESC");

                            // --- 2. EXECUÇÃO E OBTENÇÃO DOS DADOS ---
                            // Executa a instrução preparada
                            $sql->execute();

                            // Guarda o resultado retornado pela consulta
                            $resultado = $sql->get_result();

                            // --- 3. LAÇO DE REPETIÇÃO (WHILE) ---
                            // Percorre cada registro do resultado e o converte em um array associativo ($registro)
                            while($registro = $resultado->fetch_assoc())
                                {
                                   // Extrai os campos do banco de dados para variáveis locais
                                   $id = $registro["id"];
                                   $descricao = $registro["descricao"];
                                   $data_entrega = $registro["data_entrega"];
                                   $prioridade = $registro["prioridade"];
                                   $responsavel = $registro["responsavel"];      
                            ?>

                            <!-- --- 4. RENDERIZAÇÃO DAS LINHAS DA TABELA --- -->
                            <!-- Para cada registro encontrado no banco, é gerada uma nova linha (tr) na tabela -->
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $descricao ?></td>
                                <td><?php echo $data_entrega ?></td>
                                <td><?php echo $prioridade ?></td>
                                <td><?php echo $responsavel ?></td>
                            </tr>
                            
                            <?php } // Fim do laço while ?>
                        
                        </table>
                    </div>

                    <br>

                    <!-- --- 5. NAVEGAÇÃO --- -->
                    <div class="form-group">
                        <!-- Botão que redireciona o usuário de volta à página principal -->
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