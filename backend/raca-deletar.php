<?php

require "conexao.php";

try {
    $id = filter_input(INPUT_GET,'id');
    $sql = "DELETE FROM tb_raca WHERE id = :id";

    $comando = $conexao->prepare($sql);
    $comando->bindValue(':id',$id);   
    $comando->execute();
    header("Location: ../raca-lista.php");
  
} catch (PDOException $err) {
    error_log($err->getMessage());
    
    echo "Não foi possível realizar a operação!"; 
}



?>