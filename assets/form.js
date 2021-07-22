const ingredientsContainer = document.getElementById('ingredients-container');
ingredientForm = ingredientsContainer.dataset.prototype;
addIngredientButton = document.getElementById('add-ingredient');
let index = 0;
const regex = /__name__/g;
addIngredientButton.addEventListener('click', (e) => {
    e.preventDefault();
    index++;
    let listedForm = document.createElement('li');
    let newIngredientForm = ingredientForm.replace(regex, 'ingredient_' + index);
    listedForm.innerHTML = newIngredientForm;
    ingredientsContainer.appendChild(listedForm);
})