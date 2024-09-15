document.addEventListener('DOMContentLoaded', () => getMeal());

async function getMeal() {
    try {
        const response = await axios.get('https://www.themealdb.com/api/json/v1/1/random.php');
        const meal = response.data.meals[0];
        showMeal(meal);
    } catch (error) {
        console.error( 'Error en la api getMeal' + error);
    }
}

function showMeal(meal) {
    const strMeal = document.getElementById('strMeal');
    const strCategory = document.getElementById('strCategory');
    const strArea = document.getElementById('strArea');
    const strMealThumb = document.getElementById('strMealThumb');
    const strInstructions = document.getElementById('strInstructions');

    strMeal.textContent = `Name: ${meal.strMeal}`;
    strCategory.textContent = `Category: ${meal.strCategory}`;
    strArea.textContent = `Area: ${meal.strArea}`;

    strMealThumb.src = meal.strMealThumb;
    strMealThumb.alt = meal.strMeal;

    strInstructions.textContent = `Instructions: ${meal.strInstructions}`;

}