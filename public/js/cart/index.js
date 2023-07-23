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
  const nowUrl = location.href;
  fetch(`${nowUrl}/${id}/delete`)
  .then(( response) => response.json()) 
  .then((data)=>{
     console.log(data);
     let tbody = document.querySelector('tbody');
     //削除対象のテーブルロウ非表示
     let row = document.getElementById('row-' + id );
     tbody.removeChild(row);

     let count = Number( tbody.children.length );
     //ヘッダーのカート数の更新
     let cartCount = document.querySelector('.cart-count');
     cartCount.textContent = count;

     if(count == 0){ 
      cartCount.classList.remove('cart-exists');
      document.querySelector('.cart-table').style.display = "none";
      const redirect = `${location.protocol}//${location.host}/fish/public`;
      window.location = redirect;
     }
     

  })
  .catch((err)=>{
     console.log(err);
  });
}