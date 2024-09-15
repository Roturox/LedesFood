<?php
include 'db.php';

// Días de la semana y comidas
$dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
$comidas = ['desayuno', 'almuerzo', 'merienda', 'cena'];

foreach ($dias as $dia) {
    foreach ($comidas as $comida) {
        $receta_id = $_POST["{$dia}_{$comida}"];
        
        if (!empty($receta_id)) {
            // Guardar el plan semanal en la base de datos
            $sql = "INSERT INTO plan_semanal (dia, comida, receta_id) VALUES ('$dia', '$comida', '$receta_id')";
            if (mysqli_query($conn, $sql)) {
                echo "Plan de $comida para $dia guardado correctamente.<br>";
            } else {
                echo "Error: " . mysqli_error($conn) . "<br>";
            }
        }
    }
}

mysqli_close($conn);
?>
