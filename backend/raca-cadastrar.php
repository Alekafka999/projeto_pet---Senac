<?php
require_once "conexao.php";

try {
   
   $raca        = filter_input(INPUT_POST,'raca');   

   $sql = "INSERT INTO tb_raca(raca)VALUES(:raca)";

   $comando = $conexao->prepare($sql);
   $comando->bindValue(':raca',$raca);
   
   $comando->execute();
   header('Location: ../raca-lista.php');

} catch (PDOException $err) {
    error_log($err->getMessage());
    
    echo "Não foi possível cadastrar!"; 
}




?>