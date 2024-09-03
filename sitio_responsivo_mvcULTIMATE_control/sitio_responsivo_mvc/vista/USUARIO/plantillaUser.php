<?php
session_start();
if (!isset($_SESSION['id_documento']) || $_SESSION['id_categoria'] !== 2) {
    header('Location: ../inicioSesion.php');
    exit;
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Tour People</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../css/styles_header.css">

</head>
<body>
<header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="logo">
                        <img src="../../img/b.png" alt="Tour People Logo">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="search-bar mb-3">
                        <input type="text" class="form-control" placeholder="Buscar...">
                    </div>
                    <nav class="nav-menu">
                        <a href="#">Ver sitios</a>
                        <a href="#">Ver hoteles</a>
                        <a href="#">Ver restaurantes</a>
                        <a href="#">Comprar artesanías</a>
                    </nav>
                </div>
                <div class="col-md-3 text-end">
                    <div class="user-profile">
                        <span class="me-2">Hola, <?php echo $_SESSION['nombre_p']; ?></span>
                        <img src="../img/default-profile.png" alt="Perfil" id="profileImage">
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="seccion3.php">Ver perfil</a>
                            <a href="seccion2.php">Editar perfil</a>
                            <a href="borrar-perfil.php">Borrar perfil</a>
                            <a href="membresia.php">Membresía</a>
                            <a href="../../controller/logout.php">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h1><?php echo $pageTitle; ?></h1>
        <?php echo $content; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/JavaScript" src="../../js/usuario.js"></script>
    <script type="text/JavaScript" src="../../js/welcome.js"></script>
    
</body>
</html>