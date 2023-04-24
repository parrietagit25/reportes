<?php 
$modalDocu =1;
$id = $_GET['id']; 
require_once("../../controladores/UsuarioController.php");
$usuariosController = new UsuarioController(); 
$registroUnico = $usuariosController->obtenerUsuario($id);
$tipos = $usuariosController->obtenerTipos();

if (isset($_GET['eliminar_usuario'])) { ?>

    <div class="form-group">
        <label for="inputNombreCaso"> <b> Nombre del usuario </b></label>
        <p><?php echo htmlspecialchars($registroUnico["nombre"]); ?></p>
        <label for="inputNumeroPrograma" style="color:red;"><b>Esta seguro que desea elimina este usuario ?</b></label>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">

<?php }else{ ?>


        <div class="form-group">
            <label for="inputNombreCaso"> <b> Nombre Completo</b></label>
            <input type="text" name="nombre" id="" class="form-control" required autocomplete="off" value="<?php echo $registroUnico["nombre"]; ?>">
        </div>
        <div class="form-group">
            <label for="inputNombreCaso"> <b> Email</b></label>
            <input type="text" name="email" id="" class="form-control" required autocomplete="off" value="<?php echo $registroUnico["email"]; ?>">
        </div>
        <div class="form-group">
            <label for="inputNombreCaso"> <b> Tipo Usuario</b></label>
            <select name="tipo_user" id="" class="form-control">
                <option value="">Seleccionar</option>
                <?php foreach ($tipos as $key => $value) { ?>
                <option value="<?php echo $value['tipo']; ?>" <?php if($value['tipo'] == $registroUnico["tipo_user"]){ echo 'selected';} ?>><?php echo $value['descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputNombreCaso"> <b> Password</b></label>
            <input type="text" name="password" id="" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="inputNombreCaso"> <b> Estatus</b></label>
            <select name="stat" id="" class="form-control">
                <option value="">Seleccionar</option>
                <option value="1" <?php if($registroUnico['stat'] == 1){ echo 'selected';} ?>>ON</option>
                <option value="2" <?php if($registroUnico['stat'] == 2){ echo 'selected';} ?>>OFF</option>
            </select>
        </div>
        <br>
        <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">


<?php 

}