        <div class="container">'
            <h1 class="page-header">Asignar Materias a Maestros</h1>
            <div class="table-responsive">

                <?php
                if(isset($_REQUEST['id'])){
                    $ide=$_GET['id'];
                    $idu=$_GET['idu'];
                    include ('Materia.php');
                    $user=new Materia();
                    $user->deleteMateriaMat($ide,$idu);
                }
                require_once("header.php");
                require_once("bd.php");
                require_once("Materia.php");
                echo"<form action='Asignamateria.php' method='Post' name='asigna'>
                <table class='table table-striped'><thead><tr><th>Maestros</th></tr></thead><td>

                <select name='idu' id='idu'>";

                $new=new Materia();
                $new->selectuser();
                echo"</table><div id='contenido'></div>";
                echo"</div></div>";
                require_once("footer.php");
                echo"<script type='text/javascript'>
            $(function (e) {
                $('#idu').click(function (e) {
                    $('#contenido').load('MateriasAsignadas.php?idu=' + this.options[this.selectedIndex].value);
                })
            })
        </script>";

                ?>
