<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php
        session_start();
        if(!isset( $_SESSION["usuario"])){
        
            header ("location:login.php");
            }
        
        ?>
        
        <div>TODO write content</div>
        
        <?php
        echo "Hola: ". $_SESSION["usuario"].  "<br><br>";
         ?>
        <p>blabla</p>
    </body>
</html>
