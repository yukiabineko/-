window.addEventListener('load', ()=>{
 /* let file = document.getElementById('file');
  let fileText = document.querySelector('.file-text');

  file.addEventListener('change', event=>{
    const name = event.currentTarget.files[0].name;
    fileText.textContent = name;

    let parent = document.querySelector('.files');
    const before = document.querySelector('.file-box');


    let img = document.getElementById('img');
    if(img){
      parent.removeChild(img);
    }

    img = document.createElement('img');
    img.id = "img";
    img.style.width = "100%";
    img.style.aspectRatio = "2 / 1";
  
    let reader = new FileReader();
    reader.onload = ev =>{
      img.setAttribute('src', ev.target.result);
    }
    reader.readAsDataURL(event.target.files[0]);
    parent.insertBefore(img,before);
    */
   
  });
  /**
   * ファイルインプット追加
   */
  const addInput = ()=>{
    
    const count = document.querySelectorAll('.file-box').length;

    let files = document.querySelector('.files');
    let box = document.createElement('div');
    box.className = "file-box";
    box.id = "box" + ( count + 1 );

    let fileInput = document.createElement('input');
    fileInput.type = "file";
    fileInput.name = "file[]";
    fileInput.className = "file";
    fileInput.id = "file" + ( count + 1 );
    fileInput.addEventListener('change',setImage);

    let span = document.createElement('span');
    span.className = "file-text";
    span.id = "text" + ( count + 1 );

    let label = document.createElement('label');
    label.className = "file-label";
    label.htmlFor = "file" + ( count + 1 );
    label.textContent = "写真選択";

    box.appendChild(fileInput);
    box.appendChild(span);
    box.appendChild(label);
    files.appendChild(box);
   
   }
   /**
    * 画像配置
    */
   const setImage = (e) =>{
    let parent = e.target.parentElement;
    const id = parent.id.split('box')[1];
    const file = e.target.files[0];
    alert(file.name);
   }
  