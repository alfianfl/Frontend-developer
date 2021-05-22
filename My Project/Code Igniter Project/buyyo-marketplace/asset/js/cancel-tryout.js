window.addEventListener('DOMContentLoaded', () => {



  $('.cancel-tryout').on('click', function () {

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: `Transaksi akan dibatalkan dan dihapus`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus transaksi',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Dibatalkan!',
          'Transaksi anda telah dihapus',
          'success'
        );

        setTimeout(() => {
          // hapus transaksi
          let id = $(this).data('id');
          let url = $(this).data('url');
          let tokenUser = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMSIsInVzZXJuYW1lIjoidGVzdDEifQ.Ft-BaYS7JfAFK3N_x2Jtyr26eZXzBU_ZPixazXcwsjU';

          fetch(`${url}api/trans_tryout/${id}`, {
              headers: {
                "Content-Type": "application/json",
                "X-Authorization": tokenUser
              },
              method: "DELETE"
            })
            .then(() => document.location.href = `${url}customer/tryout/paymentstatus`);
        }, 2000);

      }
    });
  });










});