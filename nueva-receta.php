    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    
    <h1>Agregar una nueva receta</h1>
    <form action="save_recipe.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nombre de la receta" required><br>
        <input type="text" name="image" placeholder="URL de la imagen"><br>
        <input type="text" name="duration" placeholder="Duración de cocina"><br>
        <textarea name="ingredients" placeholder="Ingredientes" rows="4"></textarea><br>
        <textarea name="description" placeholder="Descripción" rows="6"></textarea><br>
        <button type="submit">Guardar Receta</button>
    </form>
    


    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>