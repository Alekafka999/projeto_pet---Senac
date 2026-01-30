<?php
require_once "conexao.php";

try {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, "nome");
    $especie = filter_input(INPUT_POST, "especie");
    $raca = filter_input(INPUT_POST, "raca");
    $porte = filter_input(INPUT_POST, "porte");
    $idade = filter_input(INPUT_POST, "idade");
    $obs = filter_input(INPUT_POST, "obs");

    if (!$id) {
        echo "ID do pet inválido.";
        exit;
    }

    $sql = "UPDATE tb_cadastro
            SET nome = :nome,
                id_especie = :especie,
                id_raca = :raca,
                porte = :porte,
                idade = :idade,
                obs = :obs
            WHERE id = :id";

    $comando = $conexao->prepare($sql);
    $comando->bindValue(":nome", $nome);
    $comando->bindValue(":especie", $especie);
    $comando->bindValue(":raca", $raca);
    $comando->bindValue(":porte", $porte);
    $comando->bindValue(":idade", $idade);
    $comando->bindValue(":obs", $obs);
    $comando->bindValue(":id", $id, PDO::PARAM_INT);

    $comando->execute();
    header("Location: ../pet-lista.php");
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível atualizar!";
}
?>
