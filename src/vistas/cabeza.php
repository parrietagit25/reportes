<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https:////cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"> 
    <script src="https://cdn.tiny.cloud/1/kwwosdjo27gpzd692eqjzd6bgjkc9p6jlpuwehmy3dklmn0l/tinymce/5/tinymce.min.js"></script>

    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav class="nav flex-column">
                    <?php if ($_SESSION['usuario']["tipo_user"] == 'admin') {  ?>
                    <a class="nav-link active" aria-current="page" href="index.php">Principal</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Usuario</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?view=ver">Usuarios</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Reportes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="reportes.php?view=reportes">Reporte</a></li>
                        </ul>
                    </li>
                    <a class="nav-link" href="logout.php">Salir</a>
                </nav>
            </div>
            <div class="col-md-9">