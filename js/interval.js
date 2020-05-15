let minus = document.querySelector(".btn-interval-minus");
let result = document.querySelector(".btn-interval-time");
let plus = document.querySelector(".btn-interval-plus");

function substract(){
if(result.textContent<=1){
  result.textContent = 1;
} else {
  result.textContent = parseInt(result.textContent)-1;
}
}

function addition(){
if(result.textContent>=24){
  result.textContent = 24;
} else {
  result.textContent = parseInt(result.textContent)+1;
}
}
minus.addEventListener("click", substract);
plus.addEventListener("click", addition);
