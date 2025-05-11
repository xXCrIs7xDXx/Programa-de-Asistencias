<?php
if (!empty($_POST['btnentrada'])) {
    if (!empty($_POST['txtdni'])) {
        $dni = $_POST['txtdni'];
        $consulta = $conexion->query("SELECT COUNT(*) as 'total' FROM empleado WHERE dni='$dni'");
        $id = $conexion->query("SELECT id_empleado FROM empleado WHERE dni='$dni'");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;



            $consultaFecha = $conexion->query("SELECT entrada FROM asistencia WHERE id_empleado=$id_empleado order by id_asistencia desc limit 1");
            $fechaBD = $consultaFecha->fetch_object()->entrada;

            if (substr($fecha, 0, 10) == substr($fechaBD, 0, 10)) {
?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "ERROR",
                            type: "error",
                            text: "Ya se registro la entrada",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php
            } else {
                $sql = $conexion->query("INSERT INTO asistencia(id_empleado,entrada)values($id_empleado,'$fecha')");
                if ($sql == true) {
                ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "EXITO",
                                type: "success",
                                text: "Entrada registrada",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php } else {
                ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "ERROR",
                                type: "error",
                                text: "Error al registrar la entrada",
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
                        text: "El CI ingresado no existe",
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
                    text: "Ingrese el CI",
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

<!-- REGISTRO DE SALIDA -->

<?php
if (!empty($_POST['btnsalida'])) {
    if (!empty($_POST['txtdni'])) {
        $dni = $_POST['txtdni'];
        $consulta = $conexion->query("SELECT COUNT(*) as 'total' FROM empleado WHERE dni='$dni'");
        $id = $conexion->query("SELECT id_empleado FROM empleado WHERE dni='$dni'");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $busqueda = $conexion->query("SELECT id_asistencia FROM asistencia WHERE id_empleado=$id_empleado ORDER BY id_asistencia DESC LIMIT 1");
            $id_asistencia = $busqueda->fetch_object()->id_asistencia;  

            $consultaFecha = $conexion->query("SELECT salida FROM asistencia WHERE id_empleado=$id_empleado order by id_asistencia desc limit 1");
            $fechaBD = $consultaFecha->fetch_object()->salida;

            if (substr($fecha, 0, 10) == substr($fechaBD, 0, 10)) {
?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "ERROR",
                            type: "error",
                            text: "Ya se registro la salida",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php
            } else {
                $sql = $conexion->query(" UPDATE asistencia SET salida='$fecha' WHERE id_asistencia=$id_asistencia");
                if ($sql == true) {
                ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "EXITO",
                                type: "success",
                                text: "Salida registrada",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php } else {
                ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "ERROR",
                                type: "error",
                                text: "Error al registrar la salida",
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
                        text: "El CI ingresado no existe",
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
                    text: "Ingrese el CI",
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