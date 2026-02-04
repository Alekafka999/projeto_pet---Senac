<?php
require_once"conexao.php";

try{
    $especie = filter_input(INPUT_POST,'especie');

    $sql = "INSERT INTO tb_especie(especie)VALUES(:especie)";

$comando = $conexao->prepare($sql);
$comando->bindValue(':especie',$especie);
$comando-> execute();
    
// echo"Cadastro realizado com sucesso!";
header("Location: ../index.html");
    }catch (PDOException $err){
    error_log($err->getMessage());
    echo"Não foi possível cadastrar!";    
}



?>