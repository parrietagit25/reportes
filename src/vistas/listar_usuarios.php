<?php  include 'cabeza.php'; ?>

<div class="container">
    <h1 class="my-4">Lista de usuarios</h1>
    <a href="index.php?view=agregar" class="btn btn-primary mb-3">Agregar usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario["id"]); ?></td>
                    <td><?php echo htmlspecialchars($usuario["nombre"]); ?></td>
                    <td><?php echo htmlspecialchars($usuario["email"]); ?></td>
                    <td><?php echo htmlspecialchars($usuario["edad"]); ?></td>
                    <td>
                        <a href="index.php?view=editar&id=<?php echo $usuario["id"]; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <!-- Aquí puedes agregar un enlace o botón para eliminar el usuario si lo deseas -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'pie.php'; ?>
