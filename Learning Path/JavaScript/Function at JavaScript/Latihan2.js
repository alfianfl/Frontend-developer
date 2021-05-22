function tambah(a,b){
    return a+b;
}
function kali(){
    var hasilkali=1;
    for (var i=0; i<arguments.length;i++){
        hasilkali = hasilkali * arguments[i];
    }
    return hasilkali;
}

var a,
    b,
    hasil,
    lagi=true;
    
while(lagi){
    a = parseInt(prompt('Progam penjumlahan, masukan nilai pertama : '));
    b = parseInt(prompt('Progam penjumlahan, masukan nilai kedua : '));

    hasil = tambah(a,b);
    alert(hasil);
    lagi = confirm('apakah ingin input lagi?');
}

    
    alert('Hasil kali adalah '+kali(3,3,4,1));




