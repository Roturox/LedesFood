<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<!-- Link del boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Link del css -->
 <link rel="stylesheet" href="./assets/css/styles.css">
<!-- Link de los Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- Link de las Fuentes -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@100..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<title>LedesFood</title>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <!-- Menú de hamburguesa -->
        <div class="menu-icon" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <!-- Logo centrado -->
        <div class="logo">
            Ledes<span style="color: #359e08;">Food</span>
        </div>

        <!-- Iconos de favoritos y login -->
        <div class="header-icons">
            <a href="./recetas.php"><i class="fas fa-heart"></i></a>
            <a href="login.php"><i class="fas fa-user-circle"></i></a>
        </div>
    </header>

    <!-- Menú desplegable -->
    <nav class="nav-menu" id="nav-menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="nueva-receta.php">Nueva Receta</a></li>
            <li><a href="recetas.php">Recetas Guardadas</a></li>
            <li><a href="lista-compras.php">Lista de Compras</a></li>
            <li><a href="planificador-menus.php">Planificador de Menús</a></li>
            <li><a href="cerrar-sesion.php" style="color: red;">Cerrar Sesión</a></li>
        </ul>
    </nav>