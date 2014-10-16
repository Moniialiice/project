<div class="container">'
    <h1 class="page-header">Consultar grupos y materias</h1>

<?php
require("header.php");
require_once("bd.php");
require_once("Materia.php");
$new=new Materia();
$new->buscamt();?>
<script>//funcion que envia un arreglo que se encuentra en el servidor a cliente, lenguaje en java
$(function(){
        var autocompletar=new Array();//finaliza lenguaje java
        <?php //Lenguaje php
        for ($y=0;$y<count($nombres);$y++)
        { ?>
            autocompletar.push('<?php echo $nombres[$y];?>');//combinacion de java con php
        <?php } ?>
    $("#buscar").autocomplete({ //lenguaje en java
    source:autocompletar
    });
    });
    </script>

    <form action ='buscau.php' method='POST' id='not' target="_self">
        <table class='responsive-table responsive-table-input-matrix'>
            <tr><td > Criterio de Búsqueda</td><td><input type='text' name='busnot' id='buscar'></td></tr>
            <tr><td colspan=2><center><input type='submit' value='Buscar'></center></td></tr>

        </table>

    </form>
    <div id='nott'></div>
    <script type="text/javascript">
        $(function (e) {
            $('#not').submit(function (e) {
                e.preventDefault()
                $('#nott').load('buscanoticia.php?' + $('#not').serialize())
            })
        })
    </script>