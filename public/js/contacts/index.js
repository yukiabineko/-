window.addEventListener('load',()=>{
    /**
     * 問い合わせリスト
     */
    document.querySelectorAll('.contact-list').forEach( contact =>{
        contact.addEventListener('click', event =>{
            //問い合わせ内容コンテンツ
            let textBody= contact.children[0].children[1];
            let buttonText =  contact.children[0].children[0].children[1];
            if( textBody.dataset.status == 'off' ){
                textBody.classList.add('body-open');
                textBody.dataset.status = "on";
                buttonText.textContent = "閉じる";

            }
            else{
                textBody.classList.remove('body-open');
                textBody.dataset.status = "off";
                buttonText.textContent = "内容を見る";
            }
            
        });
    });
});