    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

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
