<?php
require_once "conexao.php";

try {
   
   $nome        = filter_input(INPUT_POST,'nome');
   $especie     = filter_input(INPUT_POST,'especie');
   $raca        = filter_input(INPUT_POST,'raca');
   $porte       = filter_input(INPUT_POST,'porte');
   $idade       = filter_input(INPUT_POST,'idade');
   $obs         = filter_input(INPUT_POST,'obs');
   

   $sql = "INSERT INTO tb_cadastro(nome,especie,raca,porte,idade,obs)VALUES(:nome,:especie,:raca,:porte,:idade,:obs)";

   $comando = $conexao->prepare($sql);
   $comando->bindValue(':nome',$nome);
   $comando->bindValue(':especie',$especie);
   $comando->bindValue(':raca',$raca);
   $comando->bindValue(':porte',$porte);
   $comando->bindValue(':idade',$idade);
   $comando->bindValue(':obs',$obs);
   
   $comando->execute();
   echo "Cadastro realizado com sucesso!";

} catch (PDOException $err) {
    error_log($err->getMessage());
    
    echo "Não foi possível cadastrar!"; 
}



?>