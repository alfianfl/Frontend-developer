alert('Hai !! Selamat datang Tenyom');
var boolean = confirm('Perkenalkan diri kamu');
var lagi = true;
if (boolean==true){
    while (lagi){
        var nama = prompt('masukan nama :');
        var kelas = prompt('Pekerjaan kamu apa? :');
        var hobi = prompt('masukan Hobi :');
        lagi=confirm('Mau Ada yang diubah  ?');
    }
    alert('Hai !! Selamat datang ' + ' ' + nama + ' ' + 'Seorang' +' ' + kelas + ' ' +'yang hobi'+' '+hobi);
}
else {
    alert('Sombong Amat !! ');
}
