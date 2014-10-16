<div class="container">
    <h1 class="page-header">Asignar Materias a Maestros</h1>
    <div class="table-responsive">
    <?php
    require("header.php");
    include_once"bd.php";
    $sql="SELECT * FROM usuario";
    $query=mysql_query($sql) or die ("error");;
    $cuantos=mysql_num_rows($query);
    echo"<form action = 'five.php' method = 'POST'>";
    echo"<table class='table table-striped' align='center'><tr><td><center>Maestro:</td><td><select name='idm' id='idm'>";
    for($y=0; $y<$cuantos; $y++){
    $idm=mysql_result($query,$y,'iduser');
    $nombre=mysql_result($query,$y,'name');
    echo"<option value='$idm'>".$nombre."</option>";
}

echo"</select></center></td></tr>";
    echo"<tr><td colspan='2'><center><input type='submit' value='Seleccionar'></center></td></tr>

</table></form>";
    require("footer.php");
    ?>

</div>
</div> <!-- /container -->