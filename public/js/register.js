window.addEventListener('load',()=>{
   let formGroup = document.querySelector('.file-group');
   let fileText = document.querySelector('.file-text');
   let fileButton = document.getElementById('file');

   //ファイル選択時
   fileButton.addEventListener('change', event=>{


       let fileData = event.target.files[0];
       fileText.textContent = fileData.name;

       let img = document.getElementById('file-img');
       if(img){ formGroup.removeChild(img);}

        img = document.createElement('img');
       img.id = "file-img";
       

       let reader = new FileReader();
       reader.onload = ()=>{
         let result = reader.result;
         img.setAttribute('src', result);
       }
       reader.readAsDataURL(fileData);
       formGroup.appendChild(img);
       

   });


   //=>load finish
});
const closeModal = ()=>{
  let checkbox = document.getElementById('use_regulations-check');
  checkbox.checked = !checkbox.checked;
}