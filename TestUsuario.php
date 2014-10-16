<div class="container">'
    <h1 class="page-header">Administrar Usuario</h1>

<?php
require("header.php");
require('Usuario.php');
$user=new Usuario();
if(isset($_POST['guarda'])){
    switch($_POST['guarda']){
        case 'Guardar';
            $user->createUsuario($_POST['name'],$_POST['fname'],$_POST['sname'],$_POST['phone']);
          break;
        case 'Modificar';
            $user->updateUsuario($_POST['id_mod'],$_POST['name'],$_POST['fname'],$_POST['sname'],$_POST['phone']);
            break;
        case 'Borrar';
            $user->deleteUsuario($_POST['id_del']);
            break;
        case 'Buscar';
            $user->viewUsuario($_POST['id_user']);
    }
    }
 //$user -> createUsuario('Lalo','Lopez','Juarez','722732713');
echo"<div class='table-responsive'>";
echo"<form action='TestUsuario.php' name='alumno' method='POST'>
    <table class='table table-striped' align='center'>
       <tr><td>Nombre:*<input type='tex' name='name'></td></tr>
       <tr><td>Apellido Paterno:*<input type='tex' name='fname'></td></tr>
       <tr><td>Apellido Paterno:*<input type='tex' name='sname'></td></tr>
       <tr><td>Tel&eacute;fono:*<input type='tex' name='phone'></td></td>
       <tr><td>Nivel:*<select name='lvl'>
                <option value='1'>Administrador</option>
                <option value='2'>Maestro</option>
                <option value='3'>Alumno</option>
           </select></td></tr>
       <tr><td><input type='submit' name='guarda' value='Guardar'></td></tr></table>

    <table class='table table-striped' align='center'>
    <tr><td>Modifica<input type='text' name='id_mod'><input type='submit' name='guarda' value='Modificar'></td></tr>
    <tr><td>Borrar<input type='text' name='id_del'><input type='submit' name='guarda' value='Borrar'></td></tr>
    <tr><td>Buscar<input type='text' name='id_user'><input type='submit' name='guarda' value='Buscar'></td></tr>
    </table>
</form>";
$user -> readUsuario();
//$user -> viewUsuario(2);
require("footer.php");
?>

    </div>
</div> <!-- /container -->