<?php  include 'cabeza.php'; ?>
<div class="container">
    <h1 class="my-4">Editar usuario</h1>
    <form action="index.php?view=editar&id=<?php echo $usuario['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php include 'pie.php'; ?>
