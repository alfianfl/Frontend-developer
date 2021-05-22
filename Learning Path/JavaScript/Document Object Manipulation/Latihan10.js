//membuat intreaksi image
const thumb = document.querySelectorAll('.thumbs');
const container = document.querySelector('.container');



    container.addEventListener('click', function(event){
        if(event.target.className == 'thumbs'){

            thumb.forEach(function(e){
                e.setAttribute('class','thumbs');
            });
            event.target.classList.add('active');
 
        };
    })

