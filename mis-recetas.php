<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
?>

<!-- Esto sirve para mostrar la receta de la base de datos -->
<main>
    <h2>Mis Recetas</h2>
    <div id="recipes-list">
        <?php
        // Consulta las recetas desde la base de datos
        $sql = "SELECT * FROM recipes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Genera el HTML para cada receta
                echo '<div class="recipe-card" onclick="openModal(' . $row['id'] . ')">';
                echo '<img src="' . $row['image_url'] . '" alt="' . htmlspecialchars($row['title'], ENT_QUOTES) . '">';
                echo '<h3>' . htmlspecialchars($row['title'], ENT_QUOTES) . '</h3>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay recetas disponibles.</p>";
        }
        ?>
    </div>
</main>

<!-- Modal para mostrar detalles de la receta -->
<div id="recipeModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <img id="modal-recipe-image" src="" alt="">
        <h3 id="modal-recipe-title"></h3>
        <p id="modal-recipe-description"></p>
        <p><strong>Tiempo de cocina:</strong> <span id="modal-recipe-time"></span> minutos</p>
        <p><strong>Ingredientes:</strong> <span id="modal-recipe-ingredients"></span></p>
    </div>
</div>

<script>
// Script para manejar la apertura del modal y la carga de datos
function openModal(recipeId) {
    // Aquí usaremos fetch para obtener los datos de la receta seleccionada desde el servidor
    fetch(`get-recipe.php?id=${recipeId}`)
        .then(response => response.json())
        .then(recipe => {
            document.getElementById('modal-recipe-title').textContent = recipe.title;
            document.getElementById('modal-recipe-image').src = recipe.image_url;
            document.getElementById('modal-recipe-description').textContent = recipe.description;
            document.getElementById('modal-recipe-time').textContent = recipe.cooking_time;
            document.getElementById('modal-recipe-ingredients').textContent = recipe.ingredients;

            document.getElementById('recipeModal').style.display = 'block';
        });
}

// Cerrar el modal
document.querySelector('.close-btn').addEventListener('click', () => {
    document.getElementById('recipeModal').style.display = 'none';
});

// Cerrar el modal al hacer clic fuera del contenido
window.addEventListener('click', (event) => {
    const modal = document.getElementById('recipeModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
</script>

<?php include 'includes/footer.php'; ?>