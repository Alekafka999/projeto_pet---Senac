<?php
// define as constantes de conexão
try{
define("SERVIDOR","localhost");
define("USUARIO","root");
define("SENHA","");
define("BANCO", "db_pet");

$conexao = new PDO("mysql:host=". SERVIDOR.";dbname=". BANCO.";charset=utf8mb4",USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $err){
    echo"Erro ao conectar no banco de dados".$err->getMessage();
}
?>