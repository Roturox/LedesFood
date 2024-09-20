    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>


    <main>
    <h1>Agregar Nueva Receta</h1>

    <form action="nueva-receta.php" method="POST" enctype="multipart/form-data" class="nueva-receta">

        <div class="container-foto">
            <figure class="image-container">
                    <img id="imagen">
            </figure>
            <input type="file" id="upload-button"  name="imagen" accept="image/*">
            <label for="upload-button" class="upload-button" for="imagen">
                <i class="fas fa-upload"></i> &nbsp; Foto Receta
            </label>
        </div>


        <div class="form-group">
            <label for="nombre">Nombre de la receta:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="tiempo_preparacion">Tiempo de preparación (e.g., 30 minutos):</label>
            <input type="text" id="tiempo_preparacion" name="tiempo_preparacion" required><br>

            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" required></textarea><br>

            <label for="instrucciones">Instrucciones:</label>
        <textarea id="instrucciones" name="instrucciones" required></textarea><br>

        
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Selecciona una categoría</option>
            <option value="Desayuno">Desayuno</option>
            <option value="Almuerzo">Almuerzo</option>
            <option value="Merienda">Merienda</option>
            <option value="Cena">Cena</option>
        </select><br><br>
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
                $categoria = mysqli_real_escape_string($conn, $_POST['categoria']); // Nueva categoría


                                               // Validar que todos los campos estén completos
                                               if (!empty($nombre) && !empty($ingredientes) && !empty($instrucciones) && !empty($categoria)) {
                                                // Insertar la receta en la base de datos
                                                $imagen = $_FILES['imagen']['name'];
                                                        $target_dir = "assets/images/";
                                                        $target_file = $target_dir . basename($imagen);

                                                        // Mover el archivo subido a la carpeta de destino
                                                        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                                                            // Guardar la receta en la base de datos
                                                            $sql = "INSERT INTO recetas (nombre ,tiempo_preparacion, ingredientes, instrucciones, imagen, categoria) 
                                                                    VALUES ('$nombre','$tiempo_preparacion', '$ingredientes', '$instrucciones', '$target_file', '$categoria')";
                            
                                                if (mysqli_query($conn, $sql)) {
                                                    echo "Receta guardada exitosamente.";
                                                } else {
                                                    echo "Error al guardar la receta: " . mysqli_error($conn);
                                                }
                                            } else {
                                                echo "Por favor, completa todos los campos.";
                                            }
                                        }
            }
            ?>


                <script>
                    let uploadButton = document.getElementById("upload-button");
                let chosenImage = document.getElementById("imagen");
                let fileName = document.getElementById("file-name");

                uploadButton.onchange = () => {
                    let reader = new FileReader();
                    reader.readAsDataURL(uploadButton.files[0]);
                    reader.onload = () => {
                        chosenImage.setAttribute("src",reader.result);
                    }
                    fileName.textContent = uploadButton.files[0].name;
                }
                </script>


    <!-- Pie de Página -->
     <?php include 'includes/footer.php'; ?> 