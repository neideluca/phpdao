<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classe Dao</title>
    </head>
    <body>
        <h1>Classe Dao</h1>
         <hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"/>
        <br>
        <?php
          require_once("config.php");
          
          $sql = new Sql();
          $usuarios = $sql->select("Select * from tb_usuarios");
          echo json_encode($usuarios);
        ?>

    </body>
</html>

