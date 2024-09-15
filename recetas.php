<!-- recetas.php -->
<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?> <!-- Incluimos la conexión a la base de datos -->

<?php
// Consulta para obtener todas las recetas
$sql = "SELECT * FROM recetas ORDER BY fecha_creacion DESC";
$result = mysqli_query($conn, $sql);

// Inicializa un array para almacenar las recetas
$recipes = [];

if (mysqli_num_rows($result) > 0) {
    // Agrega cada receta al array
    while ($row = mysqli_fetch_assoc($result)) {
        $recipes[] = [
            'title' => htmlspecialchars($row['nombre']),
            'image' => htmlspecialchars($row['imagen']),
            'instrucciones' => htmlspecialchars($row['instrucciones']),
            'tiempo_preparacion' => htmlspecialchars($row['tiempo_preparacion']),
            'ingredients' => htmlspecialchars($row['ingredientes'])
        ];
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);

?>
        <main>
                <h1>Recetas Guardadas</h1>
            <div id="recipes-list" class="recipes-list">
                <!-- Aquí se cargarán las recetas guardadas -->
                <?php foreach ($recipes as $index => $recipe): ?>
                <div class="recipe-card" data-index="<?php echo $index; ?>">
                    <img src="<?php echo $recipe['image']; ?>" alt="<?php echo $recipe['title']; ?>">
                    <h3><?php echo $recipe['title']; ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </main>


    <!-- Modal para mostrar los detalles de la receta -->
    <div id="recipeModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modal-recipe-title"></h2>
            <img id="modal-recipe-image" src="" alt="Foto de la receta">
            <p><strong>Tiempo de Preparacion:</strong>  <span id="modal-recipe-tiempo_preparacion"></span> Minutos</p>
            <p><strong>instrucciones:</strong><br><span id="modal-recipe-instrucciones"></span></p>
            <p><strong>Ingredientes:</strong> <span id="modal-recipe-ingredients"></span></p>
        </div>
    </div>




<!-- Script para la ventana emergente -->
<script>
// Recetas obtenidas desde PHP
const savedRecipes = <?php echo json_encode($recipes); ?>;

// Cargar recetas al iniciar la página
document.addEventListener('DOMContentLoaded', function () {
    const recipesList = document.getElementById('recipes-list');

    recipesList.querySelectorAll('.recipe-card').forEach(card => {
        card.addEventListener('click', () => {
            const index = card.getAttribute('data-index');
            openModal(index);
        });
    });
});

// Abrir el modal con los detalles de la receta seleccionada
function openModal(index) {
    const modal = document.getElementById('recipeModal');
    const recipe = savedRecipes[index];

    document.getElementById('modal-recipe-title').textContent = recipe.title;
    document.getElementById('modal-recipe-image').src = recipe.image;
    document.getElementById('modal-recipe-instrucciones').textContent = recipe.instrucciones;
    document.getElementById('modal-recipe-tiempo_preparacion').textContent = recipe.tiempo_preparacion;
    document.getElementById('modal-recipe-ingredients').textContent = recipe.ingredients;

    modal.style.display = 'block';
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
