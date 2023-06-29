<?php
    session_start();
    include "buscar_img.php";
    $imagens = buscar_imagens();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>Galeria</title>
    </head>
    <body>
        <main>
   
                <header>
                    <h1>Galeria</h1>
              
                </header>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <form action="salvar_img.php" method="post" enctype="multipart/form-data">
                            <!--<input class="form-control" type="file" name="foto[]" id="foto" multiple='multiple'><br>-->
                            <input class="form-control" type="file" name="foto" id="foto"><br>
                            <button class="btn btn-danger" type="submit">Salvar</button>
                        </form>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                
                <div class="gallery-container">
                    <?php 
                        if($imagens->num_rows> 0){
                            while($row = $imagens->fetch_assoc()){
                                echo "
                                    <a href='' class='gallery-items'>
                                    <img src='$row[path]' alt='Chick Hicks'>
                                    </a>
                                ";
                            }
                        }
                    ?>                   
                </div> 
        </main>
        <footer>
            <span>Copyright &copy; | Oberis Santos</span>
        </footer>
    </body>
</html>