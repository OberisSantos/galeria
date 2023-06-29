<?php
    include "vendor/autoload.php";  
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  

    $serve = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USERNAME'];
    $pass = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_DATABASE'];
    $port = $_ENV['DB_PORT'];   
    
    $conexao = new mysqli($serve, $user, $pass, $dbname, $port);

    if($conexao->connect_error){
        die("Conexão falhou ". $conexao ->connect_error);
    }else{
        return True;
        //echo "Conexão realizada com sucesso! ";
    }