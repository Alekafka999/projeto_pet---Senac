<?php
include 'conexao.php';

try {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];

    // Prepara a consulta SQL para inserção
    $sql = "INSERT INTO pets (nome, tipo, idade, descricao) VALUES (:nome, :tipo, :idade, :descricao)";
    $stmt = $conexao->prepare($sql);

    // Vincula os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':descricao', $descricao);

    // Executa a consulta
    $stmt->execute();

    echo "Pet cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar pet: " . $e->getMessage();
}