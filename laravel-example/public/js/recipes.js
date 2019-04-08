buttonAdd = document.getElementById('addIngredient');
buttonRemove = document.getElementById('removeIngredient');
ingredients = document.getElementById('ingredientSearch');

function addInput(){
  var input = document.createElement("INPUT");
  input.setAttribute('name', 'ingredients[]');
  input.setAttribute('type', 'text');
  input.setAttribute('placeholder', 'ingredient');
  ingredients.appendChild(input, ingredients.childNodes[0]);
  if (ingredients.childNodes.length > 2){
    buttonRemove.removeAttribute("disabled");
  }
}
function removeInput(){
  ingredients.removeChild(ingredients.childNodes[ingredients.childNodes.length-1]);
  console.log(ingredients.childNodes);
  if (ingredients.childNodes.length <= 2){
    buttonRemove.setAttribute('disabled', true);
  }
}
if (ingredients.childNodes.length <= 2){
  buttonRemove.setAttribute('disabled', true);
}

buttonAdd.addEventListener('click', addInput);
buttonRemove.addEventListener('click', removeInput);
