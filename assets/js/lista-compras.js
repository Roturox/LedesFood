document.addEventListener('DOMContentLoaded', function () {
    // Cargar la lista de compras guardada si existe
    loadShoppingList();

    // Agregar nuevo elemento a la lista
    document.getElementById('add-item').addEventListener('click', function () {
        const newItemInput = document.getElementById('new-item');
        const newItemText = newItemInput.value.trim();
        if (newItemText !== "") {
            addShoppingItem(newItemText);
            newItemInput.value = ""; // Limpiar el campo de entrada
        }
    });

    // Limpiar elementos comprados
    document.getElementById('clear-completed').addEventListener('click', function () {
        clearCompletedItems();
    });
});

// Añadir un nuevo ingrediente a la lista de compras
function addShoppingItem(itemText) {
    const shoppingList = document.getElementById('shopping-list');

    const li = document.createElement('li');
    li.textContent = itemText;

    // Botón para marcar como comprado
    const completeBtn = document.createElement('button');
    completeBtn.textContent = "Comprado";
    completeBtn.classList.add('remove-btn');
    completeBtn.addEventListener('click', function () {
        li.classList.toggle('completed');
        saveShoppingList();
    });

    // Botón para eliminar el ingrediente
    const removeBtn = document.createElement('button');
    removeBtn.textContent = "Eliminar";
    removeBtn.classList.add('remove-btn');
    removeBtn.addEventListener('click', function () {
        li.remove();
        saveShoppingList();
    });

    li.appendChild(completeBtn);
    li.appendChild(removeBtn);
    shoppingList.appendChild(li);

    // Guardar la lista actualizada
    saveShoppingList();
}

// Guardar la lista de compras en localStorage
function saveShoppingList() {
    const items = [];
    const shoppingList = document.querySelectorAll('#shopping-list li');
    shoppingList.forEach(li => {
        items.push({
            text: li.firstChild.textContent,
            completed: li.classList.contains('completed')
        });
    });
    localStorage.setItem('shoppingList', JSON.stringify(items));
}

// Cargar la lista de compras de localStorage
function loadShoppingList() {
    const savedItems = JSON.parse(localStorage.getItem('shoppingList'));
    if (savedItems) {
        savedItems.forEach(item => {
            addShoppingItem(item.text);
            if (item.completed) {
                document.querySelector('#shopping-list li:last-child').classList.add('completed');
            }
        });
    }
}

// Limpiar elementos comprados de la lista
function clearCompletedItems() {
    const shoppingList = document.querySelectorAll('#shopping-list li.completed');
    shoppingList.forEach(li => li.remove());
    saveShoppingList();
}