<div class="container" style="margin-top: 100px ">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px;color:grey">Data Transaksi</h2>
            <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
    </tbody>
  </table>
</div>
       
            <table id="table_id" class="table table-striped table-bordered "  cellspacing="0" width="100%">
                <thead style="color:#4a4a4a">
                    <tr>
                        <th>Keranjang</th>
                        <th>Kuantitas</th>
                        <th>Produk</th>
                        <th>Catatan</th>                     
                        <th>Harga</th>                     
                        <th>Cust</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="color: #4a4a4a" >       
                    <?php 
                        $no = 1;
                        if(isset($transactions)){
                        foreach($transactions as $item){
                    ?>    
                    <tr>
                        <td><?= $item['id_keranjang'] ?></td>
                        <td><?= $item['kuantitas'] ?></a></td>
                        <td><?= $item['nama_produk'] ?></td>
                        <td><?= $item['catatan'] ?></td>                        
                        <td><span class="status text-success">&bull;</span> <?= $item['kuantitas'] * $item['harga_produk'] ?></td>
                        <td><?= $item['nama_user'] ?></td>
                        <td>
                            <button onclick="edit_book(<?php echo $item['id_transaksi'];?>)" ><a href="<?= base_url("merch/transaction/pay_now/") . $item['id_transaksi'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i style="font-size:20px" class="material-icons btn-primary btn-xsm">V</i></a></button>
                            <button onclick="delete_book(<?php echo $item['id_transaksi'];?>)"><a href="<?= base_url("merch/transaction/not_pay/") . $item['id_transaksi'] ?>"  title="Delete" data-toggle="tooltip"><i style="font-size:20px"  class="material-icons btn-danger btn-xsm">X</i></a></button>
                        </td>
                    </tr>                   
                    <?php $no++; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable({
        drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column(3).data().sum()
      );
    },
          "oLanguage": {
              "sSearch": "Cari Keranjang: "
          }
      });
      
  } );
</script>

<footer class="footer" style="margin-top:100px">