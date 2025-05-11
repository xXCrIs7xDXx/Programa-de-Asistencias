<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtclaveactual"]) and !empty($_POST["txtclavenueva"]) and !empty($_POST["txtid"])) {
        $claveactual = md5($_POST["txtclaveactual"]);
        $clavenueva = md5($_POST["txtclavenueva"]);
        $id = $_POST["txtid"];
        $verificarClaveActual = $conexion->query("SELECT password FROM usuario WHERE id_usuario = $id ");
        if ($verificarClaveActual->fetch_object()->password == $claveactual) {
            $sql = $conexion->query("UPDATE usuario SET password = '$clavenueva' WHERE id_usuario = $id");
            if ($sql==true) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "EXITO",
                            type: "success",
                            text: "Contraseña modificada correctamente",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php
            } else {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "ERROR",
                            type: "error",
                            text: "Error al modificar la contraseña",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php
            }

        } else {
            ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "La contraseña actual no coincide",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "Los campos estan vacios",
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