var nilaiawal=1,
    jmlangkot=10;

for(nilaiawal;nilaiawal<=jmlangkot;nilaiawal++){
    if(nilaiawal<=6 && nilaiawal!==5){
        console.log('Angkot No. ' + nilaiawal + ' beroperasi dengan baik');
    }else if(nilaiawal===8 || nilaiawal===10 || nilaiawal===5){
        console.log('Angkot No. ' + nilaiawal + ' sedang lembur');
    }else{
        console.log('Angkot No. ' + nilaiawal + ' Sedang Rusak');
    }
}



