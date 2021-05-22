var s=''; 
for(var nilaiawal=1;nilaiawal<=7;nilaiawal++){
    for(var j=10;j>=1;j--){
        s +='*';
    }s +='\n';
}console.log(s);

console.log('contoh 2');

var z=''; 
for(var c=1;c<=10;c++){
    for(var b=1;b<=c;b++){
        z +='*';
    }
    z +='\n';
}
console.log(z);

console.log('contoh 3');
var a=''; 
for(var i=10;i>=1;i--){
    for(var x=1;x<=i;x++){
        a +='*';
    }
    a +='\n';
}
console.log(a);

console.log('contoh 4');

var tinggi = 5,
    hasil='',
    hasil2='',
    baris,
    kolom1,
    kolom2;

for(baris=1;baris<=tinggi;baris++){
        //spasi
        for(kolom1=1;kolom1<=tinggi-baris;kolom1++){
            hasil +=' ';
        }
        //banyak bintangnya
        for(kolom2=1;kolom2<=baris+(baris-1);kolom2++){
            hasil +='*';
        }hasil +='\n';
    }console.log(hasil);

for(baris=tinggi;baris>=1;baris--){
    //spasi
    for(kolom1=1;kolom1<=tinggi-baris;kolom1++){
        hasil2 +='-';
    }
    //banyak bintangnya
    for(kolom2=1;kolom2<=baris+(baris-1);kolom2++){
        hasil2 +='*';
    }hasil2 +='\n';
}console.log(hasil2);
 







