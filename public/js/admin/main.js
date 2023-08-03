window.addEventListener('load',()=>{
   let checkbox = document.getElementById('check');
   let main = document.querySelector('main');

   main.addEventListener('click', event=>{
     checkbox.checked = false;
   });
  
});