window.addEventListener('load', ()=>{
  let file = document.getElementById('file');
  let fileText = document.querySelector('.file-text');

  file.addEventListener('change', event=>{
    const name = event.currentTarget.files[0].name;
    fileText.textContent = name;
  });
})