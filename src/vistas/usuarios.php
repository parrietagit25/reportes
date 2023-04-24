<?php  include 'cabeza.php'; ?>

    <!-- Modal para agregar-->
    <div class="modal fade" id="registrarDocumentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputNombreCaso"> <b> Nombre Completo</b></label>
                    <input type="text" name="nombre" id="" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="inputNombreCaso"> <b> Email</b></label>
                    <input type="text" name="email" id="" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="inputNombreCaso"> <b> Tipo Usuario</b></label>
                    <select name="tipo_user" id="" class="form-control">
                        <option value="">Seleccionar</option>
                        <?php foreach ($tipos as $key => $value) { ?>
                        <option value="<?php echo $value['tipo']; ?>"><?php echo $value['descripcion']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputNombreCaso"> <b> Password</b></label>
                    <input type="text" name="password" id="" class="form-control" required autocomplete="off">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="registro_usuario">Registrar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modal para editar -->
    <div class="modal fade" id="editar_contenido" tabindex="-1" role="dialog" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miVentanaModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contenido_modal">

                </div>
                    <!-- Agrega el elemento de loader 
                    <div class="loader"></div>-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="editar_usuario">Editar</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- modal para Eliminar -->
    <div class="modal fade" id="eliminar_contenido" tabindex="-1" role="dialog" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel" style="color:red;">Eliminar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="contenido_modal_eliminar">

                    </div>
                        <!-- Agrega el elemento de loader 
                        <div class="loader"></div>-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" name="eliminar_usuario">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- modal para Eliminar email -->
    <div class="modal fade" id="eliminar_recordatorio_email" tabindex="-1" role="dialog" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel" style="color:red;">Eliminar Recordatorio Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="segundo_contenido_eliminar">

                    </div>
                        <!-- Agrega el elemento de loader 
                        <div class="loader"></div>-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" name="eliminar_recordatorio_email">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="container">
    <h1 class="my-4">Usuarios </h1>
    <button style="margin:5px;" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#registrarDocumentacion">Registrar Usuario</button>
    <br>
    <table class="table" id="supertabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipos de usuario</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuarios): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuarios["id"]); ?></td>
                    <td><?php echo htmlspecialchars($usuarios["nombre"]); ?></td>
                    <td><?php echo htmlspecialchars($usuarios["email"]); ?></td>
                    <td><?php echo htmlspecialchars($usuarios["tipo_user"]); ?></td>
                    <td><?php if($usuarios["stat"]==1){ echo '<span style="color:green">ON</span>'; }else{ echo '<span style="color:red">OFF</span>'; } ?></td>
                    <td>
                        <!--<a href="#" class="btn btn-sm btn-warning" onclick="id_modal_ver_rec(<?php echo $usuarios['id']; ?>)">Ver </a>-->
                        <a href="#" class="btn btn-sm btn-primary" onclick="id_modal_edit_rec(<?php echo $usuarios['id']; ?>)">Editar</a>
                        <!--<a href="#" class="btn btn-sm btn-success" onclick="id_modal_email_rec(<?php echo $usuarios['id']; ?>)">Email</a>-->
                        <a href="#" class="btn btn-sm btn-danger" onclick="id_model_eli_rec(<?php echo $usuarios['id']; ?>)">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'pie.php'; ?>