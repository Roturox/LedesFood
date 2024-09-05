    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido de la página -->
     <main>
        <h2>Mis Recetas</h2>
        <main>
            <h1>Recetas Guardadas</h1>
            <div id="recipes-list" class="recipes-list">
                <!-- Aquí se cargarán las recetas guardadas -->
            </div>
        </main>
    
        <!-- Modal para mostrar los detalles de la receta -->
        <div id="recipeModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2 id="modal-recipe-title"></h2>
                <img id="modal-recipe-image" src="" alt="Foto de la receta">
                <p><strong>Descripción:</strong> <span id="modal-recipe-description"></span></p>
                <p><strong>Tiempo de Cocina:</strong> <span id="modal-recipe-time"></span> minutos</p>
                <p><strong>Ingredientes:</strong> <span id="modal-recipe-ingredients"></span></p>
            </div>
        </div>

     </main>

    <!-- Pie de Página -->
    <script src="../js/mostrar-recetas.js"></script>
    <?php include 'includes/footer.php'; ?>