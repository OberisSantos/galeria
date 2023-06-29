<?php
function buscar_imagens(){
    include "conexao.php";
    
    $sql = "SELECT * FROM imagem";
    $imagens = $conexao->query($sql);
 
    return $imagens;
}

