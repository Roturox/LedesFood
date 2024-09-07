
    <!-- Parte de la logica -->
    <?php 
    include 'includes/header.php'; 
    include 'includes/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $cookingTime = $_POST['cookingTime'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];

    // Manejo de subida de imagen
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Insertar la receta en la base de datos
    $sql = "INSERT INTO recipes (title, cooking_time, description, image_url) VALUES ('$title', '$cookingTime', '$description', '$target')";
    
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Insertar ingredientes
        $recipe_id = $conn->insert_id;
        $ingredientsArray = explode(',', $ingredients);
        foreach ($ingredientsArray as $ingredient) {
            $ingredient = trim($ingredient);
            $conn->query("INSERT INTO recipe_ingredients (recipe_id, ingredient_name) VALUES ('$recipe_id', '$ingredient')");
        }

        echo "<p>Receta guardada exitosamente.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
    
    <!-- Contenido de la página -->
    <main>
        <h2 style="text-align: center; font-size: 50px;">Nueva Receta</h2>
        <form action="nueva-receta.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Imagen de la Receta:</label>
                <input type="file" name="image" accept="image/*" required><br><br>
            </div>
            <div class="form-group">
                <label for="title">Título de la Receta:</label>
                <input type="text" name="title" required><br><br>
            </div>
            <div class="form-group">
                <label for="cookingTime">Tiempo de Cocina (minutos):</label>
                <input type="number" name="cookingTime" required><br><br>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredientes (separados por coma):</label>
                <input type="text" name="ingredients" required><br><br>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" required></textarea><br><br>
            </div>
            <button type="submit">Guardar Receta</button>
        </form>
    </main>

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>