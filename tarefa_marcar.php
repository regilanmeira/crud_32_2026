<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Define a codificação de caracteres como UTF-8 para exibição correta de acentos -->
    <meta charset="UTF-8">
    <!-- Configura a viewport para garantir responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Marcar</title>
    
    <?php
    // Inclui o arquivo de referências externas (CSS, JavaScript e Bootstrap)
    include "referencias.php";
    ?>
</head>

<body>
    <!-- 
        Formulário que coleta os dados da nova tarefa e envia via método POST 
        para o arquivo 'tarefa_inserir.php' processar a gravação no banco de dados.
    -->
    <form method="post" action="tarefa_inserir.php">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <h2>Tarefa :: Marcar</h2>
                
                <!-- --- 1. CAMPO: DESCRIÇÃO --- -->
                <div class="form-group">
                    <label>Descrição</label>
                    <!-- Input obrigatorio (required) para a descrição da tarefa -->
                    <input type="text" class="form-control" required="" placeholder="Descricao da tarefa" name="txtDescricao">
                </div>

                <!-- --- 2. CAMPO: DATA DE ENTREGA --- -->
                <div class="form-group">
                    <label>Data</label>
                    <!-- Input obrigatório do tipo date para exibição do seletor de data (calendário) -->
                    <input type="date" class="form-control" required="" name="txtData">
                </div>

                <!-- --- 3. CAMPO: PRIORIDADE --- -->
                <div class="form-group">
                    <label>Prioridade</label>
                    <!-- Caixa de seleção (dropdown) com opções predefinidas de prioridade -->
                    <select name="txtPrioridade" class="form-control">
                        <option value="Alta">Alta</option>
                        <option value="Média">Média</option>
                        <option value="Baixa">Baixa</option>
                    </select>
                </div>

                <!-- --- 4. CAMPO: RESPONSÁVEL --- -->
                <div class="form-group">
                    <label>Responsável</label>
                    <!-- Input opcional de texto para nomear o responsável pela tarefa -->
                    <input type="text" class="form-control" placeholder="Responsável pela tarefa" name="txtResponsavel">
                </div>

                <br>

                <!-- --- 5. BOTÕES DE AÇÃO E NAVEGAÇÃO --- -->
                <div class="form-group">

                    <!-- Botão que submete todos os dados do formulário para tarefa_inserir.php -->
                    <button class="btn btn-primary" type="submit">Marcar</button>

                    <!-- Botão para retornar à página principal (index.php) sem enviar os dados -->
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