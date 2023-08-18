window.addEventListener('load',()=>{
    /**
     * 問い合わせリスト
     */
    document.querySelectorAll('.contact-list').forEach( contact =>{
        contact.addEventListener('click', event =>{
            //問い合わせ内容コンテンツ
            let textBody= contact.children[0].children[1];
            if( textBody.dataset.status == 'off' ){
                textBody.style.display = "flex";
                textBody.dataset.status = "on";

            }
            else{
                textBody.style.display = "none";
                textBody.dataset.status = "off";
            }
            
        });
    });
});