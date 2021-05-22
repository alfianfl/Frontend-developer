var angka;
var lagi;
do{
    angka=prompt('Masukan angka');
        if(angka % 2==0){
            alert('Angka tersebut genap');
        }else if(angka%2==1){
            alert('Angka tersebut adalah ganjil');
        }else{
            alert('error!! input yang anda masukan bukan angka');
        }
        lagi = confirm('Apakah anda ingin input lagi?');
}while(lagi);


console.log('latihan');

var nilaiawal=1,
    jmlangkot=10;

for(nilaiawal;nilaiawal<=jmlangkot;nilaiawal++){
    if(nilaiawal<=6){
        console.log('Angkot No. ' + nilaiawal + 'beroperasi dengan baik');
    }else if(nilaiawal==8){
        console.log('Angkot No. ' + nilaiawal + 'sedang lembur');
    }else{
        console.log('Angkot No. ' + nilaiawal + 'Sedang Rusak');
    }
}