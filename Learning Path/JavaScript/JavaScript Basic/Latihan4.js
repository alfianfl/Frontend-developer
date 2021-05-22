var nilaiawal=1;
for(nilaiawal ;nilaiawal<=10;nilaiawal++){

    if(nilaiawal<=6){
        console.log('Angkot ' + nilaiawal+' Berjalan dengan baik');
    }else{
        console.log('Angkot ' + nilaiawal+' Rusak');
    }
}

console.log('Cara 2');

var jmlangkot=10,
    angkotberoperasi=6,
    nilaiawal2=1;

while(nilaiawal2<=angkotberoperasi){
    console.log('Angkot ' + nilaiawal2+' Berjalan dengan baik');
    nilaiawal2++;
}
for(nilaiawal2=angkotberoperasi+1;nilaiawal2<=10;nilaiawal2++){
    console.log('Angkot ' + nilaiawal2+' Rusak');
}