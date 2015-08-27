<!DOCTYPE html> 
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="jquery-2.1.4.min.js" ></script>
    </head>
    <body>
        <div>
            <form action="../Controlador/controladorDeUsuario.php?action=buscar" method="POST" id="login">
                <input type="text" name="username" id="username" placeholder="Username" /><br>
                <input type="password" name="password" id="password" placeholder="Password" /><br><br>
                <input type="submit" name="iniciar" id="iniciar" value="Iniciar Sesion"/>
                
            </form><br>
            <label id="incorrecto" style="color: red">Usuario o contraseña invalidos</label> 
            <script>
            function desaparecerLabel(){
                 $("#incorrecto").hide();
            }    
                
           
           function aparecerLabel(){
                $("#incorrecto").show();
           }
            </script>
            
           
            
            <?php
            try {
                if($_GET['respuesta'] =="invalido"){
                    echo'<script>
               aparecerLabel();
            </script>' ;
                }else if($_GET['respuesta'] =="error"){
                    echo 'error';
                }else {
                     echo' <script>
               desaparecerLabel();
            </script>' ;
                }
                
                
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                        
            ?>
            
            
           
            
        </div>
    </body>
</html>
