 <?php
        session_start();
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <div id="LOGIN">
            <fieldset>
                <legend>Login</legend>
                <label>ID Usuario : </label> <?php echo $_SESSION['idUsuario']; ?><br>
                <label>Username : </label><?php echo $_SESSION['username']; ?><br>
                <label>Password : </label> <?php echo $_SESSION['password']; ?><br>
            </fieldset>      
        </div>
        
        <div id="Favoritos">
              <fieldset>
                <legend>Favoritos </legend>
                <table border =1px>
                    <thead >
                        <tr>
                            <th >Url</th>
                            <th>Categoria</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            
                        </tr>    
                    </thead>
                    
                    
                    <tbody>
                        
                    </tbody>
                    
                </table>
                
                
            </fieldset>
            
        </div >
        <div id="Categorias">
              <fieldset>
                <legend>Categorias </legend>
                
            </fieldset>
            
        </div>
        
    </body>
</html>
