<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Define a codificação de caracteres como UTF-8 para suporte a acentos e caracteres especiais -->
    <meta charset="UTF-8">
    <!-- Ajusta a área de exibição (viewport) para garantir a responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Pesquisar</title>

    <?php
    // Inclui o arquivo de referências que contém os links para bibliotecas externas (CSS/JS e Bootstrap)
    include "referencias.php";
    ?>
</head>

<body>
    <!-- 
        Formulário com método POST direcionado para 'tarefa_editar.php'. 
        Ao ser submetido, envia o ID digitado para a página que carregará os dados da tarefa para edição/exclusão.
    -->
    <form method="post" action="tarefa_editar.php">
        <!-- Container principal do Bootstrap para organizar e centralizar o conteúdo -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <h2>Tarefa :: Pesquisar</h2>

                    <!-- --- 1. CAMPO DE BUSCA --- -->
                    <div class="form-group">
                        <label>Id</label>
                        <!-- Input de texto obrigatório (required) para receber o ID da tarefa que será pesquisada -->
                        <input type="text" class="form-control" required="" placeholder="Id da tarefa" name="txtId">
                    </div>

                    <br>

                    <!-- --- 2. BOTÕES DE AÇÃO E NAVEGAÇÃO --- -->
                    <div class="form-group">

                        <!-- Botão para enviar o formulário contendo o campo 'txtId' para a página tarefa_editar.php -->
                        <button type="submit" formaction="tarefa_editar.php" class="btn btn-primary">Pesquisar</button>

                        <!-- Botão para retornar à página principal (index.php) sem submeter o formulário -->
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