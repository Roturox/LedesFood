    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección Principal -->

    <main>
    <h1>Planificador de Menú Semanal</h1>
    <div class="menu-planner">
        <form action="./includes/guardar-plan-semanal.php" method="POST" class="form-menu">
            <table>
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Desayuno</th>
                        <th>Almuerzo</th>
                        <th>Merienda</th>
                        <th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Días de la semana
                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

                    // Obtener las recetas desde la base de datos
                    include 'includes/db.php';
                    $sql = "SELECT id, nombre FROM recetas";
                    $result = mysqli_query($conn, $sql);
                    $recetas = [];
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $recetas[] = $row;
                        }
                    }

                    // Generar las filas para cada día
                    foreach ($dias as $dia) {
                        echo "<tr>";
                        echo "<td>$dia</td>";

                        // Crear el selector para cada comida (Desayuno, Almuerzo, Merienda, Cena)
                        $comidas = ['desayuno', 'almuerzo', 'merienda', 'cena'];
                        foreach ($comidas as $comida) {
                            echo "<td>";
                            echo "<select name='{$dia}_{$comida}'>";
                            echo "<option value=''>-- Selecciona una receta --</option>";
                            
                            // Mostrar las recetas en el selector
                            foreach ($recetas as $receta) {
                                echo "<option value='" . $receta['id'] . "'>" . htmlspecialchars($receta['nombre']) . "</option>";
                            }

                            echo "</select>";
                            echo "</td>";
                        }

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" id="save-plan" class="save-btn">Guardar Plan de Menú</button>
        </form>
    </div>
</main>

<?php mysqli_close($conn); ?> <!-- Cerrar la conexión a la base de datos -->


    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/planificador-menu.js"></script>


