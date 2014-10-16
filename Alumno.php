<?php
require("Usuario.php");
include("bd.php");

class Alumno extends Usuario{

    public function asignargrupoalum($ida, $idg){
        $query=mysql_query("INSERT INTO alum_gr (idalumno, idgrupo) VALUES ($ida, $idg )") or die ('error');
           }

    public function alumexis(){
        $query=" SELECT * FROM alum_gr";
        $consult=mysql_query($query);
        $rows=mysql_num_rows($consult);
        $existente="";
        if ($rows>0){
            for($y=0; $y<$rows; $y++){
                $idu=mysql_result($consult,$y,'idalumno');
                $exits="and iduser!=$idu"." ";
                $existente.=$exits;
                }
        }else {
            $existente="and iduser";

        }
            $query1="SELECT * FROM usuario WHERE lvl=3 AND estatus=1 $existente";
            $consult1=mysql_query($query1);
            $rows1=mysql_num_rows($consult1);
             for($y=0; $y<$rows1; $y++){
            $idu=mysql_result($consult1,$y,'iduser');
            $nombre=mysql_result($consult1,$y,'name');
            $app=mysql_result($consult1,$y,'fname');
            $apm=mysql_result($consult1,$y,'lname');
            echo"<input type='checkbox' name='idu$y' value='$idu' id='idu$y'> $nombre $app $apm<br>";
             }



    }

    public function selectgrup (){
        $sq2=mysql_query("SELECT * FROM grupo ORDER BY idgrupo") or die (mysql_error());
        $field2=mysql_num_rows($sq2);
        echo "<thead>
                    <tr><th>Grupos</th></tr>
                    </thead>
                    <tr><td><select name='idg' id='idg'>";
        for($y=0; $y<$field2;$y++){
            $idg=mysql_result($sq2,$y,'idgrupo');
            $grupo=mysql_result($sq2,$y,'grupo');
            echo"<option value='$idg'>$grupo</option>";
        }

    }

    public function grupasig(){
        echo"<script type='text/javascript'>
		 $(function (e) {
				$('#frmdo').submit(function (e) {
					e.preventDefault()
						$('#contenido').load('GrupoAsignado.php?' + $('#frmdo').serialize())
			})
		})
	</script>	";

    }

    public function recibepa(){
        $sq=mysql_query("Select * from usuario where lvl='3'order by iduser") or die (mysql_error());
        $field=mysql_num_rows($sq);
        $new=new Alumno();
        for($y=0; $y<$field;$y++){
            if (isset($_REQUEST['idu'.$y]) ){
                $idusuario=$_REQUEST['idu'.$y];
                $idgrupo=$_REQUEST['idg'];
                $new->asignargrupoalum($idusuario,$idgrupo);
            }
        }
        echo"<form action='GrupoAsignado.php' method='POST' name='frmdo' id='frmdo'>";
        $query="SELECT b.iduser,b.name,b.fname,b.lname, b.lvl, c.idalumno, a.idgrupo, a.grupo, c.id_alum_gr
          FROM grupo AS a,usuario AS b, alum_gr AS c
             WHERE b.iduser=c.idalumno AND a.idgrupo=c.idgrupo AND  a.estatus='1'
             AND c.idgrupo=$idgrupo";
        $result=mysql_query($query)or die ("error de 1");
        echo"<table class='table table-striped' ><tr>";
                         echo"<th colspan=2>Alumnos con el grupo ".mysql_result($result,0,'grupo')." </th>
                        </tr>";
        for($y=0; $y<mysql_num_rows($result); $y++){
            $idmat=mysql_result($result,$y,'idgrupo');
            echo"</tr>";
            echo"<td>".mysql_result($result,$y,'name')."</td><td><a href='five.php?id=$idmat&idu=$idusuario' ><img src='eliminar.png' width='30px'	height='30px'></a></td></tr></tr>";
        }
        echo"</table>";

    }


}


?>