<?php
    include_once 'View/header.php';
?>
    <article>
        <p>
            <?php
            if (isset($array_comentarios)){
                foreach ($array_comentarios as $valorActual) {
                    print_r($valorActual[1]);
                    echo '<br>';
                }
            }
            ?>
        </p>
    </article>

<?php
    include_once 'View/publicidad.php';
?>

<?php
    include_once 'View/footer.php';
?>
            