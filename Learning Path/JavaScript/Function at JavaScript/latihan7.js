

//1. this dengan function declaration
function halo(){
    console.log(this);
    console.log('halo');
}
this.halo();
//this pada function declaration mengembalikan object global

//2. this dengan object literal
var obj = {};
obj.halo = function() {
    console.log(this);
    console.log('halo');  
}
obj.halo();
//this pada cara ini this mengembalikan object yg bersangkutan

//3. this dengan constructor function
//1. this dengan function declaration
function Halo(){
    console.log(this);
    console.log('halo');
}
var obj1 = new Halo();
var obh2 = new Halo();
// hampir sama seperti literal tapi mengembalikan object yg "new" atau yg baru dibuat
