// Simulación de recetas guardadas en un array (normalmente esto vendría de una base de datos o localStorage)
const savedRecipes = [
    {
        title: "Ensalada César",
        image: "../assets/images/amuerzo.jpg",
        description: "Una ensalada deliciosa y fresca con lechuga, pollo, crutones y aderezo César.",
        cookingTime: 15,
        ingredients: "Lechuga, pollo, crutones, aderezo César"
    },
    {
        title: "Pizza Margherita",
        image: "assets/images/pizza-margherita.jpg",
        description: "Pizza tradicional italiana con salsa de tomate, mozzarella y albahaca fresca.",
        cookingTime: 25,
        ingredients: "Salsa de tomate, mozzarella, albahaca"
    }
    // Puedes agregar más recetas aquí
];

// Cargar recetas al iniciar la página
document.addEventListener('DOMContentLoaded', function () {
    const recipesList = document.getElementById('recipes-list');

    savedRecipes.forEach((recipe, index) => {
        const recipeCard = document.createElement('div');
        recipeCard.className = 'recipe-card';
        recipeCard.innerHTML = `
            <img src="${recipe.image}" alt="${recipe.title}">
            <h3>${recipe.title}</h3>
        `;
        recipeCard.addEventListener('click', () => openModal(index));
        recipesList.appendChild(recipeCard);
    });
});

// Abrir el modal con los detalles de la receta seleccionada
function openModal(index) {
    const modal = document.getElementById('recipeModal');
    const recipe = savedRecipes[index];

    document.getElementById('modal-recipe-title').textContent = recipe.title;
    document.getElementById('modal-recipe-image').src = recipe.image;
    document.getElementById('modal-recipe-description').textContent = recipe.description;
    document.getElementById('modal-recipe-time').textContent = recipe.cookingTime;
    document.getElementById('modal-recipe-ingredients').textContent = recipe.ingredients;

    modal.style.display = 'block';
}

// Cerrar el modal
document.querySelector('.close-btn').addEventListener('click', () => {
    document.getElementById('recipeModal').style.display = 'none';
});

// Cerrar el modal al hacer clic fuera del contenido
window.addEventListener('click', (event) => {
    const modal = document.getElementById('recipeModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
