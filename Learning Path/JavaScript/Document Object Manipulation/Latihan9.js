//lebih efektif dibandingkan cara pertama di Latihan 7 dan 8

const containers = document.querySelectorAll('.container');

containers.forEach(function(e){
    e.addEventListener('click', function(event){
        if(event.target.className == 'close'){
            event.target.parentElement.style.display = 'none';
        };
    });
});