//manipulasi Array

// 1. Menambah isi array

//cara1
var arr = ["1",2,true];

console.log(arr[0])
//cara2
var array = [];

array[0] = 1;
array[1] = "Alfian";
array[2] = "IPK";
array[3] = 3.5;
array[4] = "semester 4 Aamiin";

console.log(array);

//2. menghapus isi array

var array2 = ["alfian","fadhil","labib"];
array2[2] = undefined;
console.log(array2);

//3. menampilkan isi array
for (var i =0 ; i<array.length;i++){
    console.log(array[i]);
}

//method join
var array3 = ["alfian",1,2];

//1. push and pop
array3.push('ganteng' , 'banget');
array3.pop();


//3. unshift dan shift

array3.unshift('alhamdulliah','semoga');
array3.shift();

//4. splice
//splice(indexAwal,mauDihapusBerapa,elemenBaru1,emelembaru2,...)
array3.splice(2,2,"haha","hehe");
console.log(array3.join('-')); 

//5. slice
//slide(indexAwalBerapa,indexAkhirBerapa)(index awal terbawa sendangkan yang akhir tidak)
var arrays= array.slice(1,4);
console.log(arrays.join('-'));

//6. foreach

var angka = [1,2,3,4,5,6,7];
angka.forEach(function(e){
    console.log(e);
});
var nama = ['Alfian','fadhil','labib'];


//7. map (mengembalikan array) bisa return nilai
var angka5 = angka.map(function(e){
    return e *2;
});

console.log(angka5.join('-'));
//8 sort
var nomor = [1,2,10,5,20,3,6,8,4];
nomor.sort(function(a,b){
    return a-b;
});
console.log(nomor.join('-'));

//9. filter dan find 

var number = [1,2,3,4,5,6,10,20];
//mengembalikan array (filter)
var numbers = number.filter(function(x){
    return x >5;
});
console.log(numbers.join('-'));

//mengembalikan satu nilai saja (find)

var numbers = number.find(function(x){
   return x==10;
});
console.log(numbers);
