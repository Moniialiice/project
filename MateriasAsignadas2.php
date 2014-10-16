<?php
   require_once("bd.php");
        require_once("Materia.php");
        $new=new Materia();
                    $idusuario=$_REQUEST['idu'];
                    $idmateria=$_REQUEST['idm'];
                    $new->asignarmateriamaestro($idusuario,$idmateria);
        echo"<form action='MateriasAsignadas.php' method='POST' name='frmdo' id='frmdo'>";


$new->muesmat();

        echo"</select></td></tr>
        <tr><td colspan='2'><input type='submit' value='Agregar' name='submit'></td>
        </tr></form>";
        require_once("footer.php");
        $new->ajax();