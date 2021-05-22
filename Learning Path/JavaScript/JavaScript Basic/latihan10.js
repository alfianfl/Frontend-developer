var pil,
    lagi=true;
alert('selamat datang di game suwit jawa');
    //rules
while(lagi){
    //input manusia
    var pil =prompt('Masukan pilihan :\n 1. Gajah\n 2. Manusia \n 3. Semut');
    //inputan komputer
    var comp = Math.random();
    if(comp<0.34){
        comp='gajah';
    }else if(comp>0.34 && comp<0.54){
        comp='manusia';
    }else if(comp>0.54 && comp<0.67){
        comp='semut';
    }
    switch(pil){
        case '1':
        case 'gajah':
            if(pil==comp || pil=='1' && comp=='gajah'){
                alert('Komputer memilih gajah \n Kalian Imbang');
            }else if(comp=='semut'){
                alert('Komputer memilih manusia \n Selamat kalian menang !!');
            }else {
                alert('Komputer memilih semut \n Maaf kalian kalah:(');
            }
        break;
        case '2':
        case 'manusia':
            if(pil==comp || pil=='2' && comp=='manusia'){
                alert('Komputer memilih manusia \n Kalian Imbang');
            }else if(comp=='semut'){
                alert('Komputer memilih semut \n Selamat kalian menang !!');
            }else{
                alert('Komputer memilih gajah \n Maaf kalian kalah:(');
            }
        break;
        case '3':
        case 'semut':
            if(pil==comp || pil=='3' && comp=='semut'){
                alert('Komputer memilih semut \nKalian Imbang');
            }else if(comp=='gajah'){
                alert('Komputer memilih gajah \n Selamat kalian menang !!');
            }else {
                alert('Komputer memilih manusia \n Maaf kalian kalah:(');
            }
        break;
        default:
            alert('pilihan tidak ada');
        break;
    } lagi=confirm('apakah anda ingin bermain lagi ?');
}alert('terimakasih sudah bermain !!')

  
