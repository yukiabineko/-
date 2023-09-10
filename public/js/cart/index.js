/**
 * 画面ロード時
 */
window.addEventListener('load', ()=>{
   inputStatus();
});
/**
 * windowサイズ変更時
 */
window.addEventListener('resize', ()=>{
  inputStatus();
});


/**
 * デバイスサイズによる入力無効、有効
 */
const inputStatus = () =>{
   //パソコン版の入力エレメント
   let pcInput = document.querySelectorAll('.pc-input');
   //スマートフォンの入力エレメント
   let mobileInput = document.querySelectorAll('.mobile-input');

   if (window.matchMedia('(max-width: 768px)').matches) {
      // ウィンドウサイズ768px以下のときパソコン入力無効モバイル有効
      pcInput.forEach(input =>{
          input.setAttribute('disabled',true);
      });
      mobileInput.forEach(input =>{
          input.removeAttribute('disabled');
      });
  } else {
      // それ以外パソコン入力有効モバイル無効
      pcInput.forEach(input =>{
        input.removeAttribute('disabled');
      });
      mobileInput.forEach(input =>{
          input.setAttribute('disabled', true);
      });
  }
}

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
     if(row && tbody){
      tbody.removeChild(row);
     }

     //モバイル時には関連liタブを非表示
     let ul = document.querySelector('.mobile-cart-lists');
     let li = document.getElementById('list-' + id );
     if( ul && li ){
      ul.removeChild( li );
     }
     

     let count = Number( tbody.children.length );
     //ヘッダーのカート数の更新
     let cartCount = document.querySelector('.cart-count');
     cartCount.textContent = count;

    //削除対象の価格
     const minus = Number(row.children[4].children[0].textContent);
    //買い物かご全体合計から削除分引く
    let allTotal = document.getElementById('total-num');
    let totalMoney = Number(allTotal.textContent);

    allTotal.textContent = totalMoney - minus;



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