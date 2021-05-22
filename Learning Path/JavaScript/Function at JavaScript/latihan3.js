function tampilAngka(n){
    //base case
    if (n==0){
        return;
    }
    //base case
    console.log(n);
    return tampilAngka(n-1);
    
}

tampilAngka(10);

console.log('Progam Faktorial')
//faktorial
function faktorial(n){
        //base case
        if (n==0){
            return 1;
        }
        return n * faktorial(n-1);;
}

console.log(faktorial(6))
