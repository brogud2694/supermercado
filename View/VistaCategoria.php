<?php
include_once 'View/header.php';
?>

<table>
    <thead>
    <th>Id categoria</th>
    <th>Nombre</th>
    <th>Acciones</th>
</thead>
<tbody>
    <?php
    if (isset($categorias)) {
        foreach ($categorias as $categoriaActual) {
            if (isset($_GET['idUpd']) && $_GET['idUpd'] === $categoriaActual->getIdCategoria()) {
                echo ("<tr><form action=?Category&upd=endUpd&id=" . $categoriaActual->getIdCategoria() . " method=post>");
                echo ("<th>" . $categoriaActual->getIdCategoria() . "</th>");
                echo ("<td><input type=text name=updNameIN id=updNameIN value=" . $categoriaActual->getNombre() . "required/></td>");
                echo ("<td><input type=submi name=updBTN id=updBTN Value=Actualizar/></td>");
                echo ("<td><a href=index.php?Category&upd=cancel>Cancelar</a></td>");
                echo ("</form></tr>");
            } else {
                echo ("<tr>");
                echo ("<th>" . $categoriaActual->getIdCategoria() . "</th>");
                echo ("<td>" . $categoriaActual->getNombre() . "</td>");
                echo ("<td><a href=index.php?Category&upd=strUpd&id=" . $categoriaActual->getIdCategoria() . ">Actualizar</a></td>");
                echo ("<td><a href=index.php?Category&del=" . $categoriaActual->getIdCategoria() . ">Borrar</a></td>");
                echo ("</tr>");
            }
        }
    }
    ?>
</tbody>
</table>

<form action="?Category&ins=insert" method="post">
    <fieldset>
        <legend>Nueva categoria</legend>
        <div>
            <label for="nombre">Nombre de la categoria:</label>
            <input type="text" id="nameIN" name="nameIN" required/>
        </div>

        <input type="submit" id="insertBTN" name="insertBTN" value="Enviar"/>
        </div>
        <div>
            <?php
            if (isset($respuesta)) {
                echo $respuesta;
            }
            ?>
        </div>
    </fieldset>
</form>

<?php
if (isset($_GET['ERR'])) {
    if ($_GET['ERR'] == MSSQL_FK_ERR) {
        echo "No se pueden eliminar categorias que posean artíuclos relacionados </br>";
    }
}
?>


<?php
include_once 'View/publicidad.php';
?>

<?php
include_once 'View/footer.php';
?>