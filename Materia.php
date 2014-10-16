<?php
include("bd.php");
Class Materia{
    public  $idmateria;
    private $materia;
    private $avatar;
    private $orden;
    private $estatusm;


    public function createMateria($materia, $avatar, $orden){
        echo"Crear Materia<br>";
        $query="INSERT INTO materias (nombre, avatar, orden, estatus)
                      VALUES ('$materia' ,'$avatar', '$orden', 1)";
        $result=mysql_query($query)or die ("error dae ");
        echo"Registro insertado correctamente<br>";
    }
    public function readMateria(){
        echo"Ver Materia<br>";
        $query="SELECT * FROM materias";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");

        echo"<table class='table table-striped'>
                     <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Avatar</th>
                            <th>Orden</th>
                            <th>Estatus</th>
                        </tr>
                     </thead>";
        while($field=mysql_fetch_array($result)){
            $this->idmateria=$field['id_materia'];
            $this->materia=$field['nombre'];
            $this->avatar=$field['avatar'];
            $this->orden=$field['orden'];
            $this->estatusm=$field['estatus'];
            echo"<tbody>";
            echo"<tr>";
            echo"<td>".$this->idmateria."</td>";
            echo"<td>".$this->materia."</td>";
            echo"<td>".$this->avatar."</td>";
            echo"<td>".$this->orden."</td>";
            echo"<td>".$this->estatusm."</td>";
            echo"</tr>";
            echo"</tbody>";
        }
        echo"</table>";

    }
    public function updateMateria($id_mod, $materia, $avatar, $orden){
        echo"Modificar Materia<br>";
        $query="UPDATE materias SET nombre='$materia',avatar='$avatar',orden='$orden' WHERE id_materia=$id_mod";
        $result=mysql_query($query)or die ("error de consulta");
        echo"Registro Actualizado correctamente<br>";
    }
    public function deleteMateria($id_del){
        echo"Eliminar Materia<br>";
        $query="DELETE FROM materias  WHERE  id_materia=$id_del";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");
        echo"Registro eliminado correctamente<br>";

    }
    public function viewMateria($id_user){
        echo"Ver Materia Especifico<br>";
        $query="SELECT * FROM materias WHERE  estatus='1' AND id_materia=$id_user";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");
        echo"<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Avatar</th>
                            <th>Orden</th>
                            <th>Estatus</th>
                        </tr>
                     </thead>";
        while($field=mysql_fetch_array($result)){
            $this->idmateria=$field['id_materia'];
            $this->materia=$field['nombre'];
            $this->avatar=$field['avatar'];
            $this->orden=$field['orden'];
            $this->estatusm=$field['estatus'];
            echo"<tbody>";
            echo"<tr>";
            echo"<td>".$this->idmateria."</td>";
            echo"<td>".$this->materia."</td>";
            echo"<td>".$this->avatar."</td>";
            echo"<td>".$this->orden."</td>";
            echo"<td>".$this->estatusm."</td>";
            echo"</tr>";
            echo"</tbody>";
        }
        echo"</table>";


    }

    public function asignarmateriamaestro($idmaestro, $idmateria){
        $sql5=mysql_query("insert into mat_maes (id_maestro, id_materia) values ($idmaestro, $idmateria )");

    }

    public function deleteMateriaMat($id_del, $idm){
        echo"Eliminar Materia<br>";
        $query="DELETE FROM mat_maes  WHERE  id_materia=$id_del and id_maestro=$idm";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");
        echo"Registro eliminado correctamente<br>";

    }

    public function selectuser(){
        $sq=mysql_query("Select * from usuario where lvl='2'order by iduser") or die (mysql_error());
        $field=mysql_num_rows($sq);
        for($y=0; $y<$field;$y++){
        $idu=mysql_result($sq,$y,'iduser');
        $nombre=mysql_result($sq,$y,'name');

        echo"<option value='$idu'>$nombre</option>";
        }

    }
    public function muestratea(){
        $idusuario=$_REQUEST['idu'];
        $query="SELECT u.iduser,u.name,u.fname,u.lname,u.lvl,m.id_materia,m.nombre as materia,m_m.id_mat_aux
                    FROM materias AS m,usuario AS u,mat_maes AS m_m
                     WHERE u.iduser=m_m.id_maestro AND m.id_materia=m_m.id_materia AND  m.estatus='1'
                     AND m_m.id_maestro='$idusuario'";
        $result=mysql_query($query)or die ("error de consuiñltyasuygf");
        if(mysql_num_rows($result)>0){
        echo"<table class='table table-striped' ><tr>";
        echo"<td>".mysql_result($result,0,'name')."</td>";
        echo"<td>".mysql_result($result,0,'fname')."</td>";
        echo"<td>".mysql_result($result,0,'lname')."</td>";
        echo"</tr></table>";
        echo"<table class='table table-striped'><tr>
                            <th colspan='2'>Materia</th></tr>";
        for($y=0; $y<mysql_num_rows($result); $y++){
        $idmat=mysql_result($result,$y,'id_materia');
        echo"</tr>";
        echo"<td>".mysql_result($result,$y,'materia')."</td><td><a href='Asignamateria.php?id=$idmat&idu=$idusuario' ><img src='eliminar.png' width='30px'	height='30px'></a></td></tr></tr>";
        }
        echo"</table>";
        }
        else{
            echo"<table class='table table-striped' ><tr><td>No tiene materias asignadas</td></tr>";
        }

    }

    public function muesmat(){
        $idusuario=$_REQUEST['idu'];
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
        }
        else{
            $condicon_final=" AND id_materia";
        }
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
        }else{ echo"<option value='0'>No hay materias por asignar</option>"; }

    }

    public function ajax(){
        echo"<script type='text/javascript'>
		 $(function (e) {
				$('#frmdo').submit(function (e) {
					e.preventDefault()
						$('#contenido').load('MateriasAsignadas2.php?' + $('#frmdo').serialize())
			})
		})
	</script>	";

    }

    public function buscamt(){
        $sql="SELECT CONCAT(idgrupo, grupo)AS grupo FROM grupo ORDER BY idgrupo ASC";
        $query=mysql_query($sql);
        $nombres=array();
        if(mysql_num_rows($query)==0)
        {
            array_push($nombres,"Sin informacion");
        }
        else
        {
            while($palabras=mysql_fetch_array($query))// el resultado de una consulta la conbierte en una matriz con la instrucción mysql_fetch_array
            {
                array_push($nombres,$palabras["grupo"]);//inserta datos en un vector array_push
            }
        }
        echo"Total de registros ".count($nombres);//cuenta las posisiones existentes en un vector'.count'

    }
}
?>