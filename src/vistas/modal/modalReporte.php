<?php 
$modalDocu =1;
$id = $_GET['id']; 
require_once("../../controladores/ReportesController.php");
$reporteController = new ReportesController();
$registroUnico = $reporteController->obtenerReporte($id);

if (isset($_GET['eliminar_reporte'])) { ?>
    <?php foreach ($registroUnico as $key => $value){  ?>
    <div class="form-group">
        <label for="inputNombreCaso"> <b> Titulo del Reporte </b></label>
        <p><?php echo htmlspecialchars($value["titulo"]); ?></p>
        <label for="inputNumeroPrograma" style="color:red;"><b>Esta seguro que desea elimina este reporte ?</b></label>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <?php } ?>
<?php }else{ ?>
    <?php foreach ($registroUnico as $key => $value){  ?>
    <div class="form-group">
        <label for="inputNombreCaso"> <b> Titulo</b></label>
        <input type="text" name="nombre" id="" class="form-control" required autocomplete="off" value="<?php echo $value["titulo"]; ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="inputNombreCaso"> <b> Reporte</b></label>
        <br>
        <?php echo $value["texto_report"]; ?>
    </div>
    <br>
    <?php } ?>
<?php 

}