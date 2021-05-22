//membuat object
//1. object literal
var mhs = {
    nama : 'alfian fadhil',
    NPM  : '140818180055',
    email : 'alvian.wadada@gmail.com'
}
//2. function declaration

function buatObjectmhs(nama,npm,email){
    var mhs ={};
    mhs.nama=nama;
    mhs.npm=npm;
    mhs.email=email;

    return mhs;
}

var mhs3 = buatObjectmhs('alfian','140810180055','alvian.wadada@gmail.com');

// 3. constructor function (function yang khusus untuk membuat object )

function Mahasiswa(nama,npm,email){
    // var this = {};
    this.nama = nama;
    this.npm=npm;
    this.email=email;
    //return this;
}
// kalo pakai function constructor wajib menggunakan new
var mhs4 = new Mahasiswa('pop','140810180055','alvianganteng@gmail.com');
var mhs5 = new Mahasiswa('papapop','140810180045','alviangantenggg@gmail.com');