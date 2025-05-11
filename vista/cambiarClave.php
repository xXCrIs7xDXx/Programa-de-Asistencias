<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}
$id=$_SESSION["id"];

?>


<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">CAMBIAR CONTRASEÑA</h4>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_clave.php";
    $sql = $conexion->query("SELECT * FROM usuario where id_usuario = $id");
    ?>




    <div class="row">
        <form action="" method="POST">
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <div hidden class="fl-flex-label mb-4 px-2 rounded">
                    <input type="text" placeholder="ID" class="input input__text" name="txtid" value=<?= $datos->id_usuario ?>>
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 rounded">
                    <input type="password" placeholder="Contraseña Actual" class="input input__text" name="txtclaveactual" value="">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 rounded">
                    <input type="password" placeholder="Nueva Constraseña" class="input input__text" name="txtclavenueva" value="">
                </div>
                
                <div class="text-right p-3">
                    <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
                </div>
            <?php }
            ?>
        </form>
    </div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>