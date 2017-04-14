<?php
include_once 'View/header.php';
?>

<article>
    <form action="?formularioArticulo=insertar" method="post">
        <fieldset>
            <legend>Nuevo Articulo</legend>
            <div>
                <label for="nombre">Nombre del Articulo:</label>
                <input type="text" id="nombre" name="nombre"/>
            </div>
            <div>
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio"/>
            </div>
            <div>
                <?php
                echo '<label>Unidades: </label>';
                echo '<select name="unidad">';
                if (isset($array_unidades)) {
                    foreach ($array_unidades as $valorActual) {
                        echo '<option value=' . $valorActual[0]
                        . '>' . $valorActual[1] . '</option>';
                    }
                } else {
                    echo '<option value=' . '-1' . '>' . 'Sin unidades, inserte una unidad de medida' . '</option>';
                }
                
                echo '</select>';
                echo '<input type="button" id="nuevaUnidad" name="nuevaUnidad" value="Nueva Unidad"/>'
                ?>
            </div>
            <div>
                <?php
                echo '<label>Categorías: </label>';
                if (isset($array_categorias)) {
                    foreach ($array_categorias as $valorActual) {
                         echo '<input type="checkbox" name="categorias[]" value='.$valorActual[0].'>'.$valorActual[0].'</input>';
                    }
                } else {
                     echo '<input type="checkbox" name="categorias[]" value="-1">No hay categorias</input>';
                }
                echo '<input type="button" id="nuevaCategoria" name="nuevaCategoria" value="Nueva Categoria"/>'
                
                ?>
            </div>
            <div>
                <label for="comentario">Descripción breve:</label>
                <textarea id="descripcion" name="descripcion" cols="31" rows="5"></textarea>
            </div>
            <input type="submit" id="enviar" name="enviar" value="Enviar"/>
            </div>
            <div>
                <?php
                if (isset($respuesta)) {
                    echo $respuesta;
                }//IF
                ?>
            </div>
        </fieldset>
    </form>
</article>

<?php
    include_once 'View/publicidad.php';
?>

<?php
include_once 'View/footer.php';
?>