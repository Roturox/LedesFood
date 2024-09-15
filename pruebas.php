<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?> <!-- Conexión a la base de datos -->

<h1>Planificador Semanal</h1>

<form action="planificador-menus.php" method="POST">
    <?php
    // Días y comidas
    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    $comidas = ['Desayuno', 'Almuerzo', 'Merienda', 'Cena'];

    // Obtener todas las recetas desde la base de datos
    $sql = "SELECT id, nombre FROM recetas";
    $result = mysqli_query($conn, $sql);
    $recetas = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $recetas[] = $row;
        }
    }

    // Crear el formulario para cada día y comida
    foreach ($dias as $dia) {
        echo "<h2>$dia</h2>";
        foreach ($comidas as $comida) {
            echo "<label for='{$dia}_{$comida}'>$comida:</label>";
            echo "<select name='{$dia}_{$comida}'>";
            echo "<option value=''>-- Selecciona una receta --</option>";
            
            // Mostrar las recetas en el selector
            foreach ($recetas as $receta) {
                echo "<option value='" . $receta['id'] . "'>" . htmlspecialchars($receta['nombre']) . "</option>";
            }

            echo "</select><br>";
        }
    }
    ?>
    <input type="submit" name="submit" value="Guardar Plan Semanal">
</form>

<?php
// Procesar el formulario cuando se envíe
if (isset($_POST['submit'])) {
    foreach ($dias as $dia) {
        foreach ($comidas as $comida) {
            $receta_id = $_POST["{$dia}_{$comida}"];

            // Verificar que el usuario haya seleccionado una receta
            if (!empty($receta_id)) {
                // Insertar el plan en la base de datos
                $sql = "INSERT INTO plan_semanal (dia, comida, receta_id) VALUES ('$dia', '$comida', '$receta_id')";
                if (mysqli_query($conn, $sql)) {
                    echo "Plan de $comida para $dia guardado exitosamente.<br>";
                } else {
                    echo "Error al guardar el plan: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>

<h2>Plan Semanal Guardado</h2>

<?php
foreach ($dias as $dia) {
    echo "<h3>$dia</h3>";
    foreach ($comidas as $comida) {
        // Consulta para obtener la receta asignada a cada día y comida
        $sql = "SELECT r.nombre 
                FROM plan_semanal p 
                JOIN recetas r ON p.receta_id = r.id 
                WHERE p.dia = '$dia' AND p.comida = '$comida'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<p>$comida: " . htmlspecialchars($row['nombre']) . "</p>";
        } else {
            echo "<p>$comida: Sin asignar</p>";
        }
    }
}
?>

<?php mysqli_close($conn); ?> <!-- Cerrar la conexión -->

<?php include 'includes/footer.php'; ?>
