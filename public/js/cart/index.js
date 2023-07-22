
const calcTotal = id =>{
  let price = document.getElementById('price-' + id );
  let select = document.getElementById('select-' + id );
  let total = document.getElementById('total-' + id );

  total.textContent = Number( price.textContent ) * Number( select.value );
  

}