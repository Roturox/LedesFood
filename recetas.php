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
            'ingredients' => htmlspecialchars($row['ingredientes'])
        ];
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);

?>

                <style>
                    .recipes-list {
                        margin-top: 50px;
                        display: flex;
                        flex-wrap: wrap;
                        gap: 50px;
                        justify-content: center;
                    }

                    .recipe-card {
                        width: 250px;
                        border: 1px solid #ccc;
                        border-radius: 10px;
                        padding: 10px;
                        text-align: center;
                        background-color: #ffffff;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                        cursor: pointer;
                    }

                            /* Imagen del Modal cerrado */
                    .recipe-card img {    
                        width: 100%;
                        height: 200px;
                        object-fit: cover;
                        border-radius: 5px;
                        margin-bottom: 10px;
                    }

                    .recipe-card h3 {
                        margin: 10px 0;
                        font-size: 1.2em;
                        color: #2a9d8f;
                    }

                    /* Modal estilos */
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1000;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                    }

                    .modal-content {
                        background-color: #fff;
                        margin: 10% auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%;
                        max-width: 600px;
                        border-radius: 10px;
                        text-align: left;
                        position: relative;
                    }

                    .modal-content img {
                        width: 100%;
                        height: 400px;
                        border-radius: 10px;
                        margin-bottom: 15px;
                    }

                    .close-btn {
                        position: absolute;
                        top: 10px;
                        right: 20px;
                        font-size: 1.5em;
                        color: #888;
                        cursor: pointer;
                    }

                    .close-btn:hover {
                        color: #2a9d8f;
                    }
            </style>


    <h3 style="margin-top: 120px;">Recetas Guardadas</h3>

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
        <p><strong>Descripción:</strong> <span id="modal-recipe-description"></span></p>
        <p><strong>Ingredientes:</strong> <span id="modal-recipe-ingredients"></span></p>
    </div>
</div>

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
    document.getElementById('modal-recipe-description').textContent = recipe.description;
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



<?php include 'includes/footer.php'; ?>
