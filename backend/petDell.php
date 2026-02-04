<?php
require_once"conexao.php";
try {
    $id=filter_input(INPUT_GET,'id');
    $sql="DELETE FROM tb_cadastro WHERE id = :id";
    $comando = $conexao->prepare($sql);
    $comando->bindvalue(':id',$id);
    $comando->execute();
    header("Location: ../petList.php");
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo"Não foi possível realizar a operação!";
}
?>