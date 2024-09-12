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
            
            <form action="../logic/registrar_usuario.php" method="post" id="loginForm">
                <label for="chk" aria-hidden="true" >Registrarse</label>
                <input type="text"      placeholder="Usuario"       name="usuario" required> 
                <input type="email"     placeholder="Email"         name="email" required> 
                <input type="Password"  placeholder="Contraseña"    name="contraseña" required> 
                <button type="submit" value="Registrar" class="btn">Registrarse</button>
            </form>
            <div class="change">
                    ¿Ya tenes una cuenta? <a href="./login.php">Inicia Sesion</a>
            </div>
    </main>

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>