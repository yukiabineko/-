window.addEventListener('load',()=>{

  let check = document.getElementById('check');    //=>会員メニューのチェックボックス
  let main = document.querySelector('main');
  
  
  main.addEventListener('click', event=>{
     if(check.checked == true){
        check.checked = false;
     }
  });
});