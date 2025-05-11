<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"])) {
        $id = $_POST["txtid"];
        $nombre = $_POST["txtnombre"];
        $telefono = $_POST["txttelefono"];
        $ubicacion = $_POST["txtubicacion"];
        $ruc = $_POST["txtruc"];
        $sql = $conexion->query("UPDATE empresa SET nombre='$nombre', telefono='$telefono', ubicacion='$ubicacion', ruc='$ruc' WHERE id_empresa=$id");
        if ($sql == true) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "La empresa se ha modificado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else {
        ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "La empresa no se ha modificado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php
        }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "No se ha enviado el Identificador",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php

    }
    ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php
}
?>