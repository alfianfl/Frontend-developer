// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


//set data
//univ
var get_univ = document.getElementById("univ").value;
var get_univ_array = get_univ.split(",");
var univ = [];
for(i = 0; i < get_univ_array.length-1; i++){
  univ.push(get_univ_array[i].trim())
}

//jumlah peserta dari setiap univ
var get_peserta_univ = document.getElementById("jml_peserta_univ").value;
var get_peserta_univ_array = get_peserta_univ.split(",");
var peserta_univ = [];
for(i = 0; i < get_peserta_univ_array.length-1; i++){
  peserta_univ.push(get_peserta_univ_array[i].trim())
}

//status
var get_status = document.getElementById("status").value;
var get_status_array = get_status.split(",");
var stat = [];
for(i = 0; i < get_status_array.length-1; i++){
  stat.push(get_status_array[i].trim())
}

//jumlah peserta dari setiap status
var get_peserta_status = document.getElementById("jml_peserta_status").value;
var get_peserta_status_array = get_peserta_status.split(",");
var peserta_stat = [];
for(i = 0; i < get_peserta_status_array.length-1; i++){
  peserta_stat.push(get_peserta_status_array[i].trim())
}

//total peserta
var total_peserta = 0;
for(var i in peserta_univ) { total_peserta += parseInt(peserta_univ[i]); }

document.getElementById("total").innerHTML = total_peserta + " Peserta";


// Pie Chart Pendaftar Univ
var ctx = document.getElementById("ChartPendaftarUniv");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: univ,
    datasets: [{
      data: peserta_univ,
      backgroundColor: ['#33ACE4', '#0079B2', '#CCE4F0', '#5E87C5'],
    }],
  },
});

// Pie Chart Transaksi Univ
var ctx = document.getElementById("ChartTransaksiUniv");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: stat,
    datasets: [{
      data: peserta_stat,
      backgroundColor: ['#0079B2', '#CCE4F0', '#5E87C5'],
    }],
  },
});