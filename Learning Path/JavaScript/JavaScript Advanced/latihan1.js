//1. object literal
//problemnya .yaitu tidak efektif untuk object yang banyak
let mahasiswa = {
    nama : 'alfian',
    energy : 10,

    makan : function(porsi){
        this.energy = this.energy + porsi;
        console.log(`Selamat Makan ${this.nama}`)
    }
};

//2. function declaration
// Problemnya 
function mahasiswa1(nama,energi){
    let mhs = {};
    mhs.nama=nama;
    mhs.energi=energi;
    mhs.makan= function(porsi){
        this.energi += porsi;
    }
    return mhs;

}

const mhs = mahasiswa1('pop',10);

//3. Constructor function
function Mahasiswa2(nama,energi){
    //let this = {};
    this.nama=nama;
    this.energi=energi;
    this.makan=function(porsi){
        this.energi +=porsi;
    }
}
const mhs2 = new Mahasiswa2('pop',30);
//4. Object.create()
// buat Object methodMahasiswa dan masukan fungsi makan kedalam object tersebut
//secara object literal
const methodMahasiswa = {
    makan : function(porsi){
        this.energi +=porsi;
        console.log(`halo ${this.nama}, Selamat makan!`);
    }    
};
function mahasiswa3(nama,energi){
   let mhs = Object.create(methodMahasiswa);//create object dan masukan methodMahasiswa diatas kedalam parameter
    mhs.nama = nama;
    mhs.energi = energi;

    return mhs; 
}
const alfian = mahasiswa3('alfian',50);

