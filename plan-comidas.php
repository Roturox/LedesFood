    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección Principal -->

    <main>
        <h1>Plan de Comidas</h1>
        <div class="meal-plan-container">
            <form id="meal-plan-form">
                <!-- Generar formularios para cada día de la semana -->
                <div class="day-section">
                    <h2>Lunes</h2>
                    <div class="meal-time">
                        <label for="lunes-desayuno">Desayuno:</label>
                        <select class="meal-selector" id="lunes-desayuno" data-day="lunes" data-meal="desayuno">
                            <!-- Opciones de recetas se llenarán dinámicamente -->
                        </select>
                        <label for="lunes-desayuno-porciones">Porciones:</label>
                        <input type="number" id="lunes-desayuno-porciones" min="1" value="1">
                        <textarea id="lunes-desayuno-notas" placeholder="Notas adicionales..."></textarea>
                    </div>
                    <div class="meal-time">
                        <label for="lunes-almuerzo">Almuerzo:</label>
                        <select class="meal-selector" id="lunes-almuerzo" data-day="lunes" data-meal="almuerzo"></select>
                        <label for="lunes-almuerzo-porciones">Porciones:</label>
                        <input type="number" id="lunes-almuerzo-porciones" min="1" value="1">
                        <textarea id="lunes-almuerzo-notas" placeholder="Notas adicionales..."></textarea>
                    </div>
                    <div class="meal-time">
                        <label for="lunes-cena">Cena:</label>
                        <select class="meal-selector" id="lunes-cena" data-day="lunes" data-meal="cena"></select>
                        <label for="lunes-cena-porciones">Porciones:</label>
                        <input type="number" id="lunes-cena-porciones" min="1" value="1">
                        <textarea id="lunes-cena-notas" placeholder="Notas adicionales..."></textarea>
                    </div>
                </div>
                
                <!-- Repetir bloques para otros días de la semana -->
                <!-- ... -->

                <button type="button" id="save-meal-plan" class="save-btn">Guardar Plan de Comidas</button>
            </form>
        </div>
    </main>


    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>
    <script src="./assets/js/plan-comida.js"></script>
