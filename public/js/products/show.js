window.addEventListener('load', ()=>{

   let count = 0;                                         //=>画像のスライドの回数
   let mainImage = document.querySelector('.main-img');   //=>メインイメージ
   let subImages = document.querySelectorAll('.sub-img'); //=>サブイメージ

   let leftArrow = document.querySelector('.arrow-left'); //=>左画像スライドボタン
   let rightArrow = document.querySelector('.arrow-right'); //=>右画像スライドボタン

   const wrapper = document.querySelector('.img-wrapper');  //=>画像のラッパー
   const wrapperWidth = wrapper.clientWidth;                //=>画像ラッパーの幅

   const subImageWidth = subImages[0].clientWidth;              //=>サブ画像の幅
   const margin = ( wrapperWidth - ( subImageWidth * 3) ) / 2;  //=>サブ画像のマージン

   console.log('全体幅:' + wrapperWidth);
   console.log('サブ画像幅:' + subImageWidth);
   console.log('マージン:' + margin);

   /**
    * サブ画像が３以下の場合はスライドボタンを非表示にする
    */
   if( subImages.length <= 3 ){
     leftArrow.style.display = 'none';
     rightArrow.style.display = 'none';
   }
   else{
    //スライドカウント数によりボタン表示非表示
    if( count == 0 ){
       rightArrow.style.display = 'none'; 
     }
   }



});