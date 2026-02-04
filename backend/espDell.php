<?php
require_once"conexao.php";
try {
    $id=filter_input(INPUT_GET,'id');
    $sql="DELETE FROM tb_especie WHERE id = :id";
    $comando = $conexao->prepare($sql);
    $comando->bindvalue(':id',$id);
    $comando->execute();
    header("Location: ../espList.php");
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo"Não foi possível realizar a operação!";
}
?>