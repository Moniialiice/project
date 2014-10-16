<div class="container">'
    <h1 class="page-header">Administrar Materia</h1>
    <div class="table-responsive">

        <?php
        require("header.php");
        require('Materia.php');
        $user=new Materia();
        if(isset($_POST['guarda'])){
            switch($_POST['guarda']){
                case 'Guardar';
                    $user->createMateria($_POST['materia'],$_POST['avatar'],$_POST['orden'],$_POST['estatus']);
                    break;
                case 'Modificar';
                    $user->updateMateria($_POST['id_mod'],$_POST['materia'],$_POST['avatar'],$_POST['orden'],$_POST['estatus']);
                    break;
                case 'Borrar';
                    $user->deleteMateria($_POST['id_del']);
                    break;
                case 'Buscar';
                    $user->viewMateria($_POST['id_user']);
            }
        }
        /*$user -> createMateria('Manuel ','Gonzalez','Sanchez','722732713');*/

        echo"</div>";
        echo"<form action='TestMateria.php' name='alumno' method='POST'>
    <table class='table table-striped' align='center'>
       <tr><td>Nombre:*<input type='tex' name='materia'></td></tr>
       <tr><td>Avatar:*<input type='tex' name='avatar'></td></tr>
       <tr><td>Orden:*<input type='tex' name='orden'></td></tr>
       <tr><td>Estatus:*<input type='tex' name='estatus'></td></td>
       <tr><td><input type='submit' name='guarda' value='Guardar'></td></tr></table>

    <table class='table table-striped' align='center'>
    <tr><td>Modifica<input type='text' name='id_mod'><input type='submit' name='guarda' value='Modificar'></td></tr>
    <tr><td>Borrar<input type='text' name='id_del'><input type='submit' name='guarda' value='Borrar'></td></tr>
    <tr><td>Buscar<input type='text' name='id_user'><input type='submit' name='guarda' value='Buscar'></td></tr>
    </table>
</form>";
        $user -> readMateria();
        require("footer.php");
        ?>

    </div>
</div> <!-- /container -->