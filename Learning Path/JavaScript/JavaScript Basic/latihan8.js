
var lagi;

do{
    var pil =prompt('masukan pilihan :\n 1. Nasi ayam\n 2. kare sapo \n 3. pepaya  ');
    switch(pil){
        case '1' :
        case 'nasi ayam':
            alert('anda memilih nasi ayam');
        break;
        case '2' :
        case 'kari sapi':
            alert('anda memilih kari sapi');
        break;
        case '3' :
        case 'pepaya':
            alert('anda memilih pepaya');
        break;
        default:
            alert('pilihan tidak ada');
        break;
    }
    lagi=confirm('apakah anda ingin input kembali?');
}while(lagi);alert('terimakasih !! sudah membeli');