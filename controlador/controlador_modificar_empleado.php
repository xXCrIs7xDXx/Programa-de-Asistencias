<?php
if(!empty($_POST["btnmodificar"])){
    if(!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtdni"]) and !empty($_POST["txtcargo"])){
        $id = $_POST["txtid"];
        $nombre = $_POST["txtnombre"];
        $apellido = $_POST["txtapellido"];
        $dni = $_POST["txtdni"];
        $cargo = $_POST["txtcargo"];
        $sql = $conexion->query("UPDATE empleado SET nombre='$nombre', apellido='$apellido', dni='$dni', cargo=$cargo WHERE id_empleado=$id");
        if($sql==true){ ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "El empleado se modifico correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }else{ ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "Error al modificar el empleado",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    }else{ ?>
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
    <?php } ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php }
