<style type="text/css">

  
  
    @media screen and (max-width: 414px){
        .container{
            position:relative;
            right:10px;
        }
        
    }
    @media screen and (max-width:375px){
        .container{
            position:relative;
            right:10px;
        }
        
    }
</style>
<div class="container"  style="margin-top: 100px ">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px;color:grey">Data Produk</h2>
            <a class="btn btn-primary btn-sm" style="margin-bottom:20px" href="<?= base_url() ?>merch/home/add_product/">+ ADD NEW</a>
            <table id="table_id" class="table table-striped table-bordered "  cellspacing="0" >
                <thead style="color:#4a4a4a">
                    <tr>
                        <th style="width: 100px" >ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>                  
                        <th>Stok</th>                     
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="color: #4a4a4a" >       
                    <?php 
                        $no = 1;
                        if(isset($products)){
                        foreach($products as $product){
                    ?>    
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $product['nama_produk'] ?></a></td>
                        <td><?= $product['id_kategori'] ?></td>
                        <td><span class="status text-success">&bull;</span> <?= $product['stok_produk'] ?></td>
                        <td><?= $product['harga_produk'] ?></td>
                        <td>
                            <!-- <button onclick="edit_book(<?php echo $product['id_produk'];?>)" ><a href="<?= base_url("merch/home/update_product/") . $product['id_produk'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i style="font-size:20px" class="material-icons btn-primary btn-xsm">&#xE254;</i></a></button>
                            <button onclick="delete_book(<?php echo $product['id_produk'];?>)"><a href="<?= base_url("merch/home/delete_product/") . $product['id_produk'] ?>"  title="Delete" data-toggle="tooltip"><i style="font-size:20px"  class="material-icons btn-danger btn-xsm">&#xE872;</i></a></button> -->
                            <a href="<?= base_url("merch/home/update_product/") . $product['id_produk'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i style="font-size:20px" class="material-icons btn-primary btn-xsm">&#xE254;</i></a>
                            <a href="<?= base_url("merch/home/delete_product/") . $product['id_produk'] ?>"  title="Delete" data-toggle="tooltip"><i style="font-size:20px"  class="material-icons btn-danger btn-xsm">&#xE872;</i></a>
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
      $('#table_id').DataTable();
  } );
</script>

<footer class="footer" style="margin-top:100px;max-width: 100%">