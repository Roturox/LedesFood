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
            <li><a href="cerrar-sesion.php" style="color: red;">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- Sección Principal -->

    <main>
        <h1>Lista de Compras</h1>
        <div class="shopping-list-container">
            <input type="text" id="new-item" placeholder="Agregar nuevo ingrediente...">
            <button id="add-item" class="add-btn">Agregar</button>

            <ul id="shopping-list">
                <!-- Aquí se llenarán los ingredientes dinámicamente -->
            </ul>

            <button id="clear-completed" class="clear-btn">Limpiar Comprados</button>
        </div>
    </main>

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>
    <script src="/assets/js/lista-compras.js"></script>
