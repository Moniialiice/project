        <?php
        require_once("bd.php");
        require_once("Usuario.php");
                    $idusuario=$_REQUEST['idu'];
        echo"<form action='MateriasAsignadas.php' method='POST' name='frmdo' id='frmdo'>";
        $query="SELECT u.iduser,u.name,u.fname,u.lname,u.lvl,m.id_materia,m.nombre as materia,m_m.id_mat_aux
            FROM materias AS m,usuario AS u,mat_maes AS m_m
             WHERE u.iduser=m_m.id_maestro AND m.id_materia=m_m.id_materia AND  m.estatus='1'
             AND m_m.id_maestro='$idusuario'";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");
        if(mysql_num_rows($result)>0){
        echo"<table class='table table-striped' ><tr>";
         //       echo"<td>".mysql_result($result,0,'iduser')."</td>";
                echo"<td>".mysql_result($result,0,'name')."</td>";
                echo"<td>".mysql_result($result,0,'fname')."</td>";
                echo"<td>".mysql_result($result,0,'lname')."</td>";
                echo"</tr>
             </table>";
        echo"<table class='table table-striped'><tr>

                            <th colspan='2'>Materia</th>
                        </tr>";
        for($y=0; $y<mysql_num_rows($result); $y++){
        $idmat=mysql_result($result,$y,'id_materia');
        echo"</tr>";
        echo"<td>".mysql_result($result,$y,'materia')."</td><td><a href='Asignamateria.php?id=$idmat&idu=$idusuario' ><img src='eliminar.png' width='30px'	height='30px'></a></td></tr>";
        }        //$new->asignarmateriamaestro($idusuario,$idmateria);
        echo"</table>";
        }//terina condicion
        else{echo"<table class='table table-striped' ><tr><td>No tiene materias asignadas</td></tr>";}



        $sq=mysql_query("SELECT u.iduser,u.name,u.fname,u.lname,u.lvl,m.id_materia,m.nombre AS materia,m_m.id_mat_aux
            FROM materias AS m,usuario AS u,mat_maes AS m_m
             WHERE u.iduser=m_m.id_maestro AND m.id_materia=m_m.id_materia AND  m.estatus='1'
             AND m_m.id_maestro='$idusuario'");
        echo"<input type='hidden' name='idu' id='idu' value='$idusuario'>";
        $field=mysql_num_rows($sq);
        if($field!=0){
            $condicon_final="";
        for($y=0; $y<$field; $y++){
            $idm=mysql_result($sq,$y,'id_materia');
            $condiciones="AND id_materia != '$idm'"." ";
            $condicon_final.=$condiciones;
        }
        }else{ $condicon_final=" AND id_materia"; }

        $sql_2="SELECT * FROM materias WHERE id_materia "."$condicon_final"."";
        $consult=mysql_query($sql_2);
        $rows=mysql_num_rows($consult);
        echo"<table class='table table-striped' >";
        echo"<tr><th>Asignar Materia</th></tr>";

 echo"<tr><td><select name='idm' id='idm''>";
        if($rows!=0){
        for($y=0; $y<$rows; $y++){
                $idm_2=mysql_result($consult,$y,'id_materia');
                $nombre_materia=mysql_result($consult,$y,'nombre');
                echo"<option value='$idm_2'>$nombre_materia</option>";
        }
        } else{ echo"<option value='0'>No hay materias por asignar</option>"; }
 echo"</select></td></tr>

        <tr><td colspan='2'><input type='submit' value='Agregar' name='submit'></td>
</tr>
</form>
";
        require_once("footer.php");
  echo"<script type='text/javascript'>
		 $(function (e) {
				$('#frmdo').submit(function (e) {
					e.preventDefault()
						$('#contenido').load('MateriasAsignadas2.php?' + $('#frmdo').serialize())
			})
		})
	</script>	";