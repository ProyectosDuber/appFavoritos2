 <?php
        session_start();
        ?>

<?php require_once '../Modelo/db_abstract_class.php'; ?>
<?php require_once '../Modelo/clUsuario.php'; ?>
<?php require_once '../Modelo/clFavorito.php'; ?>
<?php require_once '../Modelo/categoria.php'; ?>

<?php  $arrayDeUsuario =array();
                   $arrayDeUsuario[] = $_SESSION['username'];
                   $arrayDeUsuario[] = $_SESSION['password'];
                   
                   $query = "SELECT * FROM Usuarios where username =? and password=?";
                   
                   $usario = clUsuario::buscar($query, $arrayDeUsuario); ?>

<?php  $favoritos=  $usario->getFavoritos()?>
                   

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
                <label>ID Usuario : </label> <?php echo $usario->getIdUsuario() ?><br>
                <label>Username : </label><?php echo $usario->getUsername(); ?><br>
                <label>Password : </label> <?php echo $usario->getPassword(); ?><br>
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
                      <?php
                      
                             
                             foreach ($favoritos as $favorito){
                                 echo '<tr>';
                                 echo '<td>'.$favorito->getUrl().'</td>';
                                 echo '<td>'.$favorito->getCategoria()->getNombre().'</td>';
                                 echo '<td>'.$favorito->getDescripcion().'</td>';
                   
                                 echo '<td><a href ="./editarFavorito.php?idfavorito='.$favorito->getIdfavorito().'">Editar</a></td>';
                                 echo '<td><a href ="../Controlador/controladorDeFavoritos.php?action=delete?idfavorito='.$favorito->getIdfavorito().'">Eliminar</a></td>';

                                 echo '</tr>';
                                 
                                 
                             }
                             
                 
                             
                     
                     ?> 
                       
                        <tr><form action="../Controlador/controladorDeFavoritos.php?action=crear">
                           <td><input type="text" /></td>
                           <td><select name="Categoria">
                                  <?php
                              foreach ($favoritos as $favorito){
                                  echo '<option value="'.$favorito->getCategoria()->getIdcategoria().'" >'.$favorito->getCategoria()->getNombre().'</option>';
                              }
                                  
                                  ?>
                                   
                               </select></td>
                           <td><input type="text" /></td>
                           <td><input type="submit" /></td>
                    </form></tr> 
                       
                     
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
