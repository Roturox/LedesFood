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

    // Cargar el plan de comidas guardado si existe
    loadSavedMealPlan();
});

// Guardar el plan de comidas en localStorage
document.getElementById('save-meal-plan').addEventListener('click', function () {
    const mealPlan = {};

    const mealSelectors = document.querySelectorAll('.meal-selector');
    mealSelectors.forEach(selector => {
        const day = selector.dataset.day;
        const meal = selector.dataset.meal;
        const recipe = selector.value;
        const portions = document.getElementById(`${day}-${meal}-porciones`).value;
        const notes = document.getElementById(`${day}-${meal}-notas`).value;

        if (!mealPlan[day]) {
            mealPlan[day] = {};
        }
        mealPlan[day][meal] = {
            recipe: recipe,
            portions: portions,
            notes: notes
        };
    });

    localStorage.setItem('mealPlan', JSON.stringify(mealPlan));
    alert('Plan de Comidas guardado correctamente!');
});

// Cargar el plan de comidas guardado de localStorage
function loadSavedMealPlan() {
    const savedMealPlan = JSON.parse(localStorage.getItem('mealPlan'));
    if (savedMealPlan) {
        const mealSelectors = document.querySelectorAll('.meal-selector');
        mealSelectors.forEach(selector => {
            const day = selector.dataset.day;
            const meal = selector.dataset.meal;

            if (savedMealPlan[day] && savedMealPlan[day][meal]) {
                selector.value = savedMealPlan[day][meal].recipe;
                document.getElementById(`${day}-${meal}-porciones`).value = savedMealPlan[day][meal].portions;
                document.getElementById(`${day}-${meal}-notas`).value = savedMealPlan[day][meal].notes;
            }
        });
    }
}
