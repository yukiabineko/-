window.addEventListener('load',()=>{
    let replayButton = null;     //=>返信ボタン


    /**
     * 問い合わせリスト
     */
    document.querySelectorAll('.contact-list').forEach( contact =>{
        contact.addEventListener('mousedown', event =>{
            //問い合わせ内容コンテンツ
            let textBody= contact.children[0].children[1];
            let buttonText =  contact.children[0].children[0].children[1];

            let admin = contact.children[0].children[0].children[0].children[1];
            
            //返信ボタン（管理者のみ)
            if( admin ){
                replayButton 
                = contact.children[0].children[0].children[0].children[1].children[1];
            }
            
            /**
             * 管理者ページの場合
             */
            if( replayButton ){
                const width = replayButton.clientWidth;
                const height = replayButton.clientHeight;
                const rect = replayButton.getBoundingClientRect();
                const buttonX = rect.left;
                const buttonY = rect.top;
                let x = event.clientX;
                let y = event.clientY;
                if( ! ( x >= buttonX && x <= buttonX + width && y >= buttonY && y<= buttonY + height)){
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
                }
            }
            /**
             * 管理者でない場合
             */
            else{
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
            }
          /** 管理者、一般ユーザー分岐終了 */
            
        });
    });
    /**
     * 返信ボタン押下処理
     */
    document.querySelectorAll('.replay').forEach(btn =>{
       btn.addEventListener('click', event=>{
          console.log(btn);
       })
    });
});