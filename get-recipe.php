<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];

    // Consulta la receta con el ID proporcionado
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $recipe = $result->fetch_assoc();
        echo json_encode($recipe);
    } else {
        echo json_encode(['error' => 'Receta no encontrada.']);
    }

    $stmt->close();
}

$conn->close();
?>
