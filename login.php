    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <!-- Menú desplegable -->
    <nav class="nav-menu" id="nav-menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="plan-comidas.php">Plan de Comidas</a></li>
            <li><a href="nueva-receta.php">Nueva Receta</a></li>
            <li><a href="mis-recetas.php">Mis Recetas</a></li>
            <li><a href="lista-compras.php">Lista de Compras</a></li>
            <li><a href="planificador-menus.php">Planificador de Menús</a></li>
            <li><a href="cerrar-sesion.php" style="color: red;" >Cerrar Sesión</a></li>

        </ul>
    </nav>

    <main>
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form id="login-form">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Iniciar Sesión</button>
                <p class="register-link">¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
            </form>
        </div>
    </main>

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>