/**
 * 
 * 合計金額の更新
 */
const calcTotal = id =>{
  let price = document.getElementById('price-' + id );
  let select = document.getElementById('select-' + id );
  let total = document.getElementById('total-' + id );
  let allTotal = document.getElementById('total-num');

  total.textContent
    = Number( price.textContent ) * Number( select.value );

  //全ての商品を合計する
  let buyPrice = 0;
  console.log(document.querySelectorAll('.product-total').length);
  document.querySelectorAll('.product-total').forEach(product =>{
    console.log(product.textContent);
     buyPrice += Number(product.textContent);
  });
  //全商品の合計格納
  allTotal.textContent = buyPrice + "円(税込)";
  
}
/**
 * アイテムの削除
 */
const deleteItem = id =>{
  alert(id);
}