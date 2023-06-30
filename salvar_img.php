<?php
    include_once 'conexao.php';

    $imagem = $_FILES['foto'];
    
    //verificar se contem imagem
    if(!empty($imagem)){
        // Largura máxima em pixels
        $largura = 150;
        // Altura máxima em pixels
        $altura = 180;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 1000;
        //verificar se o arquivo é imagem
        if(preg_match("/^image\/(pjpeg|jpeg|png|bmp)$/", $imagem['type'])){
            // Pega as dimensões da imagem
            $dimensoes = getimagesize($imagem["tmp_name"]);

            //implementar depois

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
         

            // Caminho de onde ficará a imagem
            $path = "imagem/";
            $permissao = 0755;
            //verificar se a pasta existe
            if(!is_dir($path)){
                //criar a pasta e dar permissao de escrita, gravação e execucao
                mkdir($path, $permissao, true);
            }
            
            // Caminho de onde ficará a imagem alterado
            $path = $path . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho
            if(move_uploaded_file($imagem["tmp_name"], $path)){
                $sql = "INSERT INTO imagem(path) VALUES('$path')";
                $resposta = $conexao->query($sql);                
                ob_start();
                header("location: index.php");
                exit;
            };
        }
    }
    ob_start();
    header("location: index.php");
    exit;
    

