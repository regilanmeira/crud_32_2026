<?php

// --- 1. CONFIGURAÇÃO DOS PARÂMETROS DE CONEXÃO ---
// Endereço do servidor MySQL (localhost indica que o banco está rodando na mesma máquina)
$servidor = "localhost";

// Nome de usuário para autenticação no banco de dados (padrão em ambientes locais como XAMPP/WAMP)
$usuario = "root";

// Senha de acesso (vazia por padrão em ambientes de desenvolvimento local)
$senha = "";

// Nome da base de dados (Schema) que será utilizada na aplicação
$bd = "crud";


// --- 2. ABERTURA DA CONEXÃO ---
// Instancia um novo objeto da classe 'mysqli' para estabelecer a conexão com o banco de dados
$conexao = new mysqli($servidor, $usuario, $senha, $bd);


// --- 3. VERIFICAÇÃO DE ERROS ---
// Checa se ocorreu algum erro durante a tentativa de conexão
if ($conexao->connect_error) {
    // Interrompe a execução do script e exibe a mensagem de erro retornada pelo banco
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}


// --- 4. CONFIGURAÇÃO DE CODIFICAÇÃO ---
// Define o conjunto de caracteres da conexão como 'utf8mb4' para garantir o suporte adequado
// a acentuação, caracteres especiais e emojis na gravação e leitura de dados
$conexao->set_charset("utf8mb4");

?>