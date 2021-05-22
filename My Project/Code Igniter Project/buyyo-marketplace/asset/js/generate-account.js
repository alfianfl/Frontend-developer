$('a.button-change').on("click", get_account);

function get_account() {

  let idtransTryout = $(this).data('idtrans');
  let url = $(this).data('url');
  let token = $(this).data('tokns');


  $.ajax({
    url: `${url}/api/trans_tryout/readylearn?id_transaksi_tryout= ${idtransTryout}`,
    type: 'GET',
    dataType: 'json',
    success: function (res) {
      var data = res.data;
      $('#email').html(data.email);
      $('#password').val(data.password);
    },
    error: function (error) {
      alert(error.msg);
    },
    beforeSend: setHeader
  });

  function setHeader(xhr) {
    xhr.setRequestHeader('X-Authorization', token);
  }
}