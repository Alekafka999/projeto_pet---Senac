<?php
require "conexao.php";

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        die("ID inválido.");
    }

    $sql = "DELETE FROM tb_cadastro WHERE id = :id";
    $comando = $conexao->prepare($sql);
    $comando->bindValue(':id', $id, PDO::PARAM_INT);
    $comando->execute();

    header("Location: ../pet-lista.php");
    exit;

} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível excluir o pet! Erro: " . $err->getMessage();
}
?>