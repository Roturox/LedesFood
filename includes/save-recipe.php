<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $duration = $_POST['duration'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];

    try {
        // Prepara la consulta SQL usando marcadores de posición
        $stmt = $conn->prepare("INSERT INTO recipes (name, image, duration, ingredients, description) VALUES (?, ?, ?, ?, ?)");

        // Ejecuta la consulta pasando un array de valores
        $stmt->execute([$name, $image, $duration, $ingredients, $description]);

        echo "Receta guardada exitosamente.";
    } catch(PDOException $e) {
        echo "Error al guardar la receta: " . $e->getMessage();
    }
}
?>
<a href="index.php">Agregar otra receta</a> | <a href="recipes.php">Ver todas las recetas</a>
