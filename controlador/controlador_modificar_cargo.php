<?php
if (!empty($_POST['btnmodificar'])) {
    if (!empty($_POST['txtnombre'])) {
        $nombre = $_POST['txtnombre'];
        $id = $_POST['txtid'];
        $verificarNombre = $conexion->query("SELECT COUNT(*) as 'total' FROM cargo WHERE nombre = '$nombre' and id_cargo!= $id");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "El nombre <?= $nombre ?> ya existe",
                        styling: "bootstrap3"
                    })
                })
            </script>

            <?php } else {
            $sql = $conexion->query("UPDATE cargo SET nombre='$nombre' WHERE id_cargo=$id");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "El cargo se modifico correctamente",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php }
        else{
            ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "Error al modificar el cargo",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php 
        }
        }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "El campo esta vacio",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php }
    ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php
}
?>