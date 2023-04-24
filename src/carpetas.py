import os

# Crear directorios
os.makedirs("controladores", exist_ok=True)
os.makedirs("modelos", exist_ok=True)
os.makedirs("vistas", exist_ok=True)

# Contenido de los archivos
index_php = """<?php
// Contenido de index.php
"""

conexion_php = """<?php
// Contenido de modelos/Conexion.php
"""

usuario_php = """<?php
// Contenido de modelos/Usuario.php
"""

usuario_controller_php = """<?php
// Contenido de controladores/UsuarioController.php
"""

agregar_usuario_php = """<!DOCTYPE html>
<!-- Contenido de vistas/agregar_usuario.php -->
"""

listar_usuarios_php = """<!DOCTYPE html>
<!-- Contenido de vistas/listar_usuarios.php -->
"""

editar_usuario_php = """<!DOCTYPE html>
<!-- Contenido de vistas/editar_usuario.php -->
"""

# Crear y escribir archivos
with open("index.php", "w") as f:
    f.write(index_php)

with open(os.path.join("controladores", "UsuarioController.php"), "w") as f:
    f.write(usuario_controller_php)

with open(os.path.join("modelos", "Conexion.php"), "w") as f:
    f.write(conexion_php)

with open(os.path.join("modelos", "Usuario.php"), "w") as f:
    f.write(usuario_php)

with open(os.path.join("vistas", "agregar_usuario.php"), "w") as f:
    f.write(agregar_usuario_php)

with open(os.path.join("vistas", "listar_usuarios.php"), "w") as f:
    f.write(listar_usuarios_php)

with open(os.path.join("vistas", "editar_usuario.php"), "w") as f:
    f.write(editar_usuario_php)
