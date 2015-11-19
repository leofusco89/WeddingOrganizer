<?php
session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Fiestas.php");
  include_once("class/Mesas.php");
  include_once("class/AccesoDatos.php");

  $usuario = $_POST["usuario"];

  Mesas::BorrarTodasLasMesas($usuario);
  Fiestas::BorrarFiesta($usuario);
  Usuarios::BorrarUsuario($usuario);
?>
      <h1>Administración de usuarios:</h1>
      <br>
      <br>
      <table id="tablaUsuarios">
        <tr>
          <td>Usuario</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Sexo</td>
          <td>Email</td>
          <td></td>
        </tr>
  
        <?php


  $usuarios = Usuarios::TraerTodosLosUsuarios();

          foreach ($usuarios as $unUsuario) {

            if ($unUsuario->usuario != "admin") {
              echo 
              "<tr>
                <td>".$unUsuario->usuario."</td>
                <td>".$unUsuario->nombre."</td>
                <td>".$unUsuario->apellido."</td>
                <td>".$unUsuario->sexo."</td>
                <td>".$unUsuario->email."</td>
                <td>
        <a onclick='EliminarUsuario(\"$unUsuario->usuario\")' display='inline'>
          <img src='img/eliminar.ico'/ style='cursor: pointer;'>
        </a></td>
               </tr>";
            }
          }
        ?>
      </table>