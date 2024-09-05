    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección Principal -->

    <main>
        <h1>Planificador de Menú Semanal</h1>
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
                    <!-- Se generan filas para cada día de la semana -->
                    <tr>
                        <td>Lunes</td>
                        <td><select class="meal-selector" data-day="lunes" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="lunes" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="lunes" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="lunes" data-meal="cena"></select></td>
                    </tr>
                    <!-- Replicar el mismo bloque para los demás días -->
                    <tr>
                        <td>Martes</td>
                        <td><select class="meal-selector" data-day="martes" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="martes" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="martes" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="martes" data-meal="cena"></select></td>
                    </tr>
                    <tr>
                        <td>Miercoles</td>
                        <td><select class="meal-selector" data-day="miercoles" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="miercoles" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="miercoles" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="miercoles" data-meal="cena"></select></td>
                    </tr>
                    <tr>
                        <td>jueves</td>
                        <td><select class="meal-selector" data-day="jueves" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="jueves" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="jueves" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="jueves" data-meal="cena"></select></td>
                    </tr>
                    <tr>
                        <td>Viernes</td>
                        <td><select class="meal-selector" data-day="viernes" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="viernes" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="viernes" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="viernes" data-meal="cena"></select></td>
                    </tr>
                    <tr>
                        <td>Sabado</td>
                        <td><select class="meal-selector" data-day="sabado" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="sabado" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="sabado" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="sabado" data-meal="cena"></select></td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td><select class="meal-selector" data-day="domingo" data-meal="desayuno"></select></td>
                        <td><select class="meal-selector" data-day="domingo" data-meal="almuerzo"></select></td>
                        <td><select class="meal-selector" data-day="domingo" data-meal="Merienda"></select></td>
                        <td><select class="meal-selector" data-day="domingo" data-meal="cena"></select></td>
                    </tr>
                    <!-- Agrega más filas para los demás días de la semana -->
                    <!-- Miércoles, Jueves, Viernes, Sábado, Domingo -->
                    <!-- Aquí el mismo formato de celdas -->
                </tbody>
            </table>
            <button id="save-plan" class="save-btn">Guardar Plan de Menú</button>
        </div>
    </main>


    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>
    <script src="../js/planificador-menu.js"></script>


