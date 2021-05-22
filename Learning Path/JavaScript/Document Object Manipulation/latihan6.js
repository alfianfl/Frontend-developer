const imgkomputer = document.getElementsByClassName('img-komputer')[0];
function pilihanComputer(){
    const comp = Math.random() ;
    if(comp<0.34)return 'gajah' ;
    if(comp>=0.34 && comp<0.67)return 'orang';
    return 'semut';   
}
function hasil(comp,player){
    if(player==comp) return 'seri';
    if(player=='gajah') return (comp=='orang') ? 'MENANG' : 'KALAH';
    if(player=='semut') return (comp=='gajah') ? 'MENANG' : 'KALAH';
    if(player=='orang') return (comp=='semut') ? 'MENANG' : 'KALAH';
}

function putar(){
    const pil = ['gajah','semut','orang'];
    let i =0;
    const waktu = new Date().getTime();// untuk menentukan agar gambar berjenti setelah satu detik(1000)(1)

    //setInterval adalah fungsi looping dari Java Script agar gambar berubah2 selama periode waktu tertentu
    setInterval(function(){
        // untuk memberhentikan
        if(new Date().getTime()-waktu>1000){ // untuk menentukan agar gambar berjenti setelah satu detik(1000) (2)
            clearInterval();
            return;
        }
        
        imgkomputer.setAttribute('src','Latihan6/' + pil[i++] + '.png');
        if(i==pil.length){
            i=0;
        };
    }, 100);// 100 = 0.1s; , yaitu gambar barubah2 setiap 0.1s
}

//jika kita click gambar
const pilihan = document.querySelectorAll('li img');
pilihan.forEach(function(pil){
    pil.addEventListener('click',function(){
        const pilCom = pilihanComputer();
        const pilPlayer = pil.className;
        const gethasil = hasil(pilCom,pilPlayer);

        putar();

        //jalan kan dulu fungsi putar diatas baru kita set timeout agar progam dibawah berjalan setelah 1000 (1s), yaitu setelah fungsi putar berhenti
        setTimeout(function(){
            imgkomputer.setAttribute('src' , 'Latihan6/' +pilCom+'.png');
            const info = document.getElementsByClassName('info')[0];
            info.innerHTML = gethasil;
        }, 1000);

    });
});



