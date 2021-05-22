var penumpang = [],
    ulangi = true;
alert('selamat datang di progam penumpang angkot');
var tambahPenumpang = function(namaPenumpang,penumpang){
    if(penumpang.length==0){
        //jika array masih kosong
        penumpang.unshift(namaPenumpang);
        return penumpang;
    }
    else{
        //menelusuri semua array dengan for
        for(var i=0;i<penumpang.length;i++){
            //jika ada nama yang sama
            if(penumpang[i]==namaPenumpang){
                alert(namaPenumpang + ' sudah ada')
                return penumpang;
            }
            //jika ada kursi yg kosong maka pemnumpang baru harus duduk disitu terlebih dahulu
            else if(penumpang[i]==undefined){
                penumpang[i]=namaPenumpang;
                return penumpang;
            }
            //jika kursi penuh maka penumpang baru duduk dikursi terakhir
            else if(i== penumpang.length-1){
                penumpang.push(namaPenumpang);
                return penumpang;
            }
        }
    }
}
var hapuspenumpang = function(namaPenumpang,penumpang){
    if(penumpang.length==0){
        //jika array masih kosong
        console.log('Tidak ada penumpang');
        return penumpang;
    }else{
        for(var i =0;i<penumpang.length;i++){
            if(namaPenumpang==penumpang[i]){
                penumpang[i]=undefined;
                return penumpang;
            }else if(i==penumpang.length-1){
                console.log('tidak ada nama penumpang bernama ' + namaPenumpang);
                return penumpang;
            }
        }
    }
}



