    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <main>
    <h1>Agregar Nueva Receta</h1>
    <form action="nueva-receta.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="imagen">Imagen de la receta:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre de la receta:</label>
            <input type="text" id="nombre" name="nombre" required><br>
        </div>
        <div class="form-group">
            <label for="tiempo_preparacion">Tiempo de preparación (e.g., 30 minutos):</label>
            <input type="text" id="tiempo_preparacion" name="tiempo_preparacion" required><br>
        </div>
        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" required></textarea><br>
        </div>
        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
        <textarea id="instrucciones" name="instrucciones" required></textarea><br>
        </div>
        <button type="submit" name="submit" value="Agregar Receta">Guardar Receta</button>
    </form>
    </main>


        <!-- Parte logica del formulario  -->
            <?php
        include 'includes/db.php'; // Archivo de conexión a la base de datos

            if (isset($_POST['submit'])) {
                $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
                $tiempo_preparacion = mysqli_real_escape_string($conn, $_POST['tiempo_preparacion']);
                $ingredientes = mysqli_real_escape_string($conn, $_POST['ingredientes']);
                $instrucciones = mysqli_real_escape_string($conn, $_POST['instrucciones']);
        
                // Procesar la imagen
                $imagen = $_FILES['imagen']['name'];
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($imagen);
        
                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                    // Guardar la receta en la base de datos
                    $sql = "INSERT INTO recetas (nombre, tiempo_preparacion, ingredientes, instrucciones, imagen) 
                            VALUES ('$nombre', '$tiempo_preparacion', '$ingredientes', '$instrucciones', '$target_file')";
        
                    if (mysqli_query($conn, $sql)) {
                        echo "Receta agregada exitosamente.";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo "Hubo un error subiendo la imagen.";
                }
            }
            ?>



    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>