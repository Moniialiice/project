
<div class="container">'
            <h1 class="page-header">Asignar Grupos </h1>
            <div class="table-responsive">

                <?php
                require_once("header.php");
                require_once("bd.php");
                require_once("Alumno.php");
                echo"<form action='Asignagrupo.php' method='POST' name='frmdo' id='frmdo''>
                    <table class='table table-striped'><thead><tr><th>Alumnos</th></tr></thead>
<                   <tr><td>";
                    echo"<div id='contenido'>";
                         $new=new Alumno();
                            $new->alumexis();
                    echo"</td></tr>";

                        $new->selectgrup();
                echo"</select></td></tr><tr><td colspan='2'><input type='submit' value='Agregar' name='submit'></td>
                    </tr></table>
                    </div>";
                echo  "  </div>
                </div>";
                require_once("footer.php");

                $new->grupasig();