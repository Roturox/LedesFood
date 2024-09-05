    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>
    
    <!-- Contenido de la página -->
    <main>
        <h2 style="text-align: center; font-size: 50px;">Nueva Receta</h2>
        <form id="recipe-form">
            <div class="form-group">
                <label for="recipe-photo">Foto de la Receta:</label>
                <input type="file" id="recipe-photo" name="recipe-photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="recipe-title">Título de la Receta:</label>
                <input type="text" id="recipe-title" name="recipe-title" required>
            </div>
            <div class="form-group">
                <label for="cooking-time">Tiempo de Cocina (minutos):</label>
                <input type="number" id="cooking-time" name="cooking-time" min="1" required>
            </div>
            <div class="form-group">
                <label for="ingredient-quantity">Cantidad de Ingredientes:</label>
                <input type="number" id="ingredient-quantity" name="ingredient-quantity" min="1" required>
            </div>
            <div class="form-group">
                <label for="recipe-description">Descripción de la Receta:</label>
                <textarea id="recipe-description" name="recipe-description" rows="4" required></textarea>
            </div>
            <button type="submit">Guardar Receta</button>
        </form>
    </main>

    <script src="./assets/js/menu-nav.js"></script>
    <?php include 'includes/footer.php'; ?>