alert('selamat datang di game tebak angka')
var pil,
    hasil,
    lagi=true,
    comp;
        //rules
    while(lagi){
        comp=Math.floor(Math.random() * 10) + 1;  // returns a random integer from 1 to 10
        pil = prompt('masukan angka dari 1--10 : \n kamu puya 3 kesempatan ');
        for(i=3;i>=1;i--){
            var j=i-1;
           if(pil>comp){
                if(j==0){
                    hasil='Limit kamu sudah habis :((';
                }else {
                    hasil='jawaban terlalu tinggi ';
                    pil = prompt(hasil + ' masukan angka dari 1--10 : \n kamu punya ' + j + ' kesempatan ');
                }
           }else if (pil<comp){
                if(j==0){
                    hasil='Limit kamu sudah habis :((';
                }else {
                    hasil='jawaban terlalu rendah ';
                    pil = prompt(hasil + ' masukan angka dari 1--10 : \n kamu punya ' + j + ' kesempatan ');
                }
           }else{
                i=0;
                hasil='Selamat jawaban benar ';
                
           }    
        }alert(hasil +  'angkanya adalah ' + comp) ;
        lagi=confirm('apakah ingin input kembali?');
    }