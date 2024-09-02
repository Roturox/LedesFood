// Simulación de recetas disponibles (normalmente vendría de una base de datos o localStorage)
const recipes = [
    "Selecciona una receta",
    "Ensalada César",
    "Pizza Margherita",
    "Sopa de Tomate",
    "Tacos de Pollo",
    "Pasta Alfredo",
    "Salmón a la Plancha",
    "Tortilla de Verduras"
];

// Rellenar los selectores de recetas para cada día y comida
document.addEventListener('DOMContentLoaded', function () {
    const mealSelectors = document.querySelectorAll('.meal-selector');

    mealSelectors.forEach(selector => {
        recipes.forEach(recipe => {
            const option = document.createElement('option');
            option.value = recipe;
            option.textContent = recipe;
            selector.appendChild(option);
        });
    });

    // Cargar el plan de menú guardado si existe
    loadSavedMenu();
});

// Guardar el plan de menú en localStorage
document.getElementById('save-plan').addEventListener('click', function () {
    const menuPlan = {};

    const mealSelectors = document.querySelectorAll('.meal-selector');
    mealSelectors.forEach(selector => {
        const day = selector.dataset.day;
        const meal = selector.dataset.meal;
        const recipe = selector.value;

        if (!menuPlan[day]) {
            menuPlan[day] = {};
        }
        menuPlan[day][meal] = recipe;
    });

    localStorage.setItem('menuPlan', JSON.stringify(menuPlan));
    alert('Plan de Menú guardado correctamente!');
});

// Cargar el plan de menú guardado de localStorage
function loadSavedMenu() {
    const savedMenu = JSON.parse(localStorage.getItem('menuPlan'));
    if (savedMenu) {
        const mealSelectors = document.querySelectorAll('.meal-selector');
        mealSelectors.forEach(selector => {
            const day = selector.dataset.day;
            const meal = selector.dataset.meal;

            if (savedMenu[day] && savedMenu[day][meal]) {
                selector.value = savedMenu[day][meal];
            }
        });
    }
}
