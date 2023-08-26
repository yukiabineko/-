window.addEventListener('load',()=>{
  //会員メニューのチェックボックス
  let check = document.getElementById('check');  

  //モバイルハンバーガーメニューのチェックボックス           
  let mobileCheck = document.getElementById('hamberger-checkbox');
  //メイン
  let main = document.querySelector('main');
  //モバイルメニュー開閉時のバックレイヤー
  let backLayer = document.querySelector('.mobile-menu-background');


  //バックレイヤークリックでメニューとバックレイヤー閉じる
  backLayer.addEventListener('click', ()=>{
     mobileCheck.checked = false;
  });
  
  
  main.addEventListener('click', event=>{
     if(check.checked == true){
        check.checked = false;
     }
  });
});