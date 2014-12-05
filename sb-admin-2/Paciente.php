<?php
include("bd.php");
Class Paciente{
    public  $idp;
    private $nombre;
    private $app;
    private $apm;
    private $edad;
    private $sexo;
    private $telefono;
    private $correo;
    private $calle;
    private $numero;
    private $colonia;
    private $cp;
    private $imagen;

    public function createPaciente($nombre, $app, $amp, $edad,$sexo, $telefono, $correo, $calle, $numero, $colonia, $cp, $imagen){
                        $query="INSERT INTO paciente (nombre, app, amp, edad, sexo, telefono, correo, calle, numero, colonia, cp, imagen)
                         VALUES ('$nombre', '$app', '$amp', $edad, '$sexo', '$telefono', '$correo', '$calle', '$numero', '$colonia', $cp, 'imagen/nophoto.jpg')";
                        $result=mysql_query($query)or die ("error de inserpac");
                        echo"<br>Registro insertado correctamente";
    }
    public function readPaciente(){
        $query="SELECT * FROM paciente";
        $result=mysql_query($query)or die ("error de read");
        echo"<table class='table table-striped table-bordered table-hover'>
                        <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Código Postal</th>
                            <th>Imagen</th>
                        </tr>
                        </thead>";
        while($field=mysql_fetch_array($result)){
            $this->idp=$field['id_paciente'];
            $this->nombre=$field['nombre'];
            $this->app=$field['app'];
            $this->amp=$field['amp'];
            $this->edad=$field['edad'];
            $this->sexo=$field['sexo'];
            $this->telefono=$field['telefono'];
            $this->correo=$field['correo'];
            $this->calle=$field['calle'];
            $this->numero=$field['numero'];
            $this->colonia=$field['colonia'];
            $this->cp=$field['cp'];
            $this->imagen=$field['imagen'];
                        echo"<tbody><tr>";
                        echo"<td>".$this->idp."</td>";
                        echo"<td>".$this->nombre."</td>";
                        echo"<td>".$this->app."</td>";
                        echo"<td>".$this->amp."</td>";
                        echo"<td>".$this->edad."</td>";
                        echo"<td>".$this->sexo."</td>";
                        echo"<td>".$this->telefono."</td>";
                        echo"<td>".$this->correo."</td>";
                        echo"<td>".$this->calle."</td>";
                        echo"<td>".$this->numero."</td>";
                        echo"<td>".$this->colonia."</td>";
                        echo"<td>".$this->cp."</td>";
                        echo"<td><img src='".$this->imagen."' width=60px height=60px></td></td>";

                        echo"</tr>

                        </tbody>";
        }
        echo"</table>";

    }
    public function updatePaciente($idu,$nombre, $app, $amp, $edad,$sexo, $telefono, $correo, $calle, $numero, $colonia, $cp, $imagen){

        $query="UPDATE paciente SET nombre='$nombre',app='$app',amp='$amp', edad=$edad, sexo='$sexo', telefono='$telefono',
         correo='$correo', calle='$calle', numero=$numero, colonia='$colonia', cp=$cp, imagen='imagen/nophoto.jpg' WHERE id_paciente=$idu";
        $result=mysql_query($query)or die ("error update");
        echo"Registro Actualizado correctamente";
    }
    public function deletePaciente($idd){
        $query="DELETE FROM paciente  WHERE  id_paciente=$idd";
        $result=mysql_query($query)or die ("error delete");
        echo"Registro eliminado correctamente";

    }
    public function viewPaciente($idp){
        $query="SELECT * FROM paciente WHERE  id_paciente=$idp";
        $result=mysql_query($query)or die ("error de view");
        echo"<table class='table table-striped table-bordered table-hover'>
                        <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Código Postal</th>
                            <th>Imagen</th>
                        </tr>
                        </thead>";
        while($field=mysql_fetch_array($result)){
            $this->idp=$field['id_paciente'];
            $this->nombre=$field['nombre'];
            $this->app=$field['app'];
            $this->apm=$field['amp'];
            $this->edad=$field['edad'];
            $this->sexo=$field['sexo'];
            $this->telefono=$field['telefono'];
            $this->correo=$field['correo'];
            $this->calle=$field['calle'];
            $this->numero=$field['numero'];
            $this->colonia=$field['colonia'];
            $this->cp=$field['cp'];
            $this->imagen=$field['imagen'];
            echo"<tbody><tr>";
            echo"<td>".$this->idp."</td>";
            echo"<td>".$this->nombre."</td>";
            echo"<td>".$this->app."</td>";
            echo"<td>".$this->apm."</td>";
            echo"<td>".$this->edad."</td>";
            echo"<td>".$this->sexo."</td>";
            echo"<td>".$this->telefono."</td>";
            echo"<td>".$this->correo."</td>";
            echo"<td>".$this->calle."</td>";
            echo"<td>".$this->numero."</td>";
            echo"<td>".$this->colonia."</td>";
            echo"<td>".$this->cp."</td>";
            echo"<td><img src='".$this->imagen."' width=60px height=60px></td></td>";

            echo"</tr>

                        </tbody>";
        }
        echo"</table>";


    }
}
?>