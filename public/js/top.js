window.addEventListener('load',()=>{
  let imgNo = 0;
  let wrapper = document.querySelector('.main-visual-wrapper');
  const limitNo = wrapper.children.length;


  //スライダー初期画像のため最初の画像を一番後ろに追加
  let addImage = document.createElement('img');
  let src = wrapper.children[0].src;
  addImage.src = src;
  addImage.className = "mv-img";
  wrapper.appendChild(addImage);
 
  setInterval(() => {
    slider();
  }, 3000);

//スライダー処理
  const slider = ()=>{
    imgNo ++;
    if(imgNo == 1){
      wrapper.style.transition = ".5s";
    }
    const width = wrapper.clientWidth;
    wrapper.style.transform = "translateX(-" + width * imgNo + "px)";
    if(imgNo == limitNo + 1){
      imgNo = 0;
      wrapper.style.transition = "none";
      wrapper.style.transform = "translateX(0px)";
    }

  }
  
});