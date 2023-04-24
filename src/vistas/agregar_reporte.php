<?php  include 'cabeza.php'; ?>

    <!-- Modal para agregar-->
    <div class="modal fade" id="registrarReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Reporte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputNombreCaso"> <b>Titulo</b></label>
                    <input type="text" name="titulo" id="" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="inputNombreCaso"> <b> Reporte</b></label>
                    <textarea name="texto_report" id="summernote" class="form-control" ></textarea>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="registro_reporte">Registrar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modal para editar -->
    <div class="modal fade" id="ver_contenido_reporte" tabindex="-1" role="dialog" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miVentanaModalLabel">Ver Reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contenido_modal_reporte">

                </div>
                    <!-- Agrega el elemento de loader 
                    <div class="loader"></div>-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- modal para Eliminar -->
    <div class="modal fade" id="eliminar_reporte" tabindex="-1" role="dialog" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel" style="color:red;">Eliminar Reporte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="reporte_modal_eliminar">

                    </div>
                        <!-- Agrega el elemento de loader 
                        <div class="loader"></div>-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" name="eliminar_reporte">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<div class="container">
    <h1 class="my-4">Reportes </h1>
    <button style="margin:5px;" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#registrarReporte">Registrar Reporte</button>
    <br>
    <table class="table" id="supertabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Registrado Por</th>
                <th>Fecha</th>
                <th>Titulo del Reporte</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportes as $reportes_us): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reportes_us["id"]); ?></td>
                    <td><?php echo htmlspecialchars($reportes_us["nombre"]); ?></td>
                    <td><?php echo htmlspecialchars($reportes_us["fecha"]); ?></td>
                    <td><?php echo htmlspecialchars($reportes_us["titulo"]); ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning" onclick="id_modal_ver_rec(<?php echo $reportes_us['id']; ?>)">Ver </a>
                        <!--<a href="#" class="btn btn-sm btn-primary" onclick="id_modal_edit_rec(<?php echo $reportes_us['id']; ?>)">Editar</a>
                        <a href="#" class="btn btn-sm btn-success" onclick="id_modal_email_rec(<?php echo $reportes_us['id']; ?>)">Email</a>-->
                        <a href="#" class="btn btn-sm btn-danger" onclick="id_model_eli_rep(<?php echo $reportes_us['id']; ?>)">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'pie.php'; ?>