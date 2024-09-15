    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>
    <!-- Sección Principal -->
    <main>
        <section class="dashboard">
            <h1>¡Bienvenido, Roturo!</h1>
            <h2>Comidas de Hoy</h2>
            <div class="todays-meals">
                <div class="meal-card">
                    <img src="./assets/images/desayuno.jpg" alt="Desayuno">
                    <h2>Desayuno</h2>
                    <button>Ver Detalles</button>
                </div>
                <div class="meal-card">
                    <img src="./assets/images/amuerzo.jpg" alt="Almuerzo">
                    <h2>Almuerzo</h2>
                    <button>Ver Detalles</button>
                </div>
                <div class="meal-card">
                    <img src="./assets/images/merienda.jpg" alt="Cena">
                    <h2>Merienda</h2>
                    <button>Ver Detalles</button>
                </div>
                <div class="meal-card">
                    <img src="./assets/images/cena.jpeg" alt="Cena">
                    <h2>Cena</h2>
                    <button>Ver Detalles</button>
                </div>
            </div>
        </section>

        </main>
        <h2>Plan Semanal</h2>
    <div class="menu-planner">
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

                // Conectar a la base de datos
                include 'includes/db.php';

                // Recorrer cada día y comida para mostrar el plan guardado
                foreach ($dias as $dia) {
                    echo "<tr>";
                    echo "<td>$dia</td>";

                    // Comidas del día (Desayuno, Almuerzo, Merienda, Cena)
                    $comidas = ['desayuno', 'almuerzo', 'merienda', 'cena'];
                    foreach ($comidas as $comida) {
                        // Consultar el plan semanal para el día y comida actuales
                        $sql = "SELECT r.nombre 
                                FROM plan_semanal p 
                                JOIN recetas r ON p.receta_id = r.id 
                                WHERE p.dia = '$dia' AND p.comida = '$comida'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        } else {
                            echo "<td>Sin asignar</td>";
                        }
                    }

                    echo "</tr>";
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>



    

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>
