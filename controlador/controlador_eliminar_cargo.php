<?php
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conexion->query("DELETE FROM cargo WHERE id_cargo=$id");
    if($sql == true){ ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "El cargo se elimino correctamente",
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
                    text: "Error al eliminar el cargo",
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