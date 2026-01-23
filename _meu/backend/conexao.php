<?php

try {
    // Código para conectar ao banco de dados
    define("SERVIDOR", "localhost");
    define("USUARIO", "root");  
    define("SENHA", "");
    define("BANCO", "db_pet");

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO.";charset=utf8mb4", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";

} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

