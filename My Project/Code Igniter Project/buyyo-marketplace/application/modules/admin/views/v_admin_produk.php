<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Produk</title>
</head>
<body>
    <h1>Admin Produk Page Placeholder</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Merchant</th>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Keterangan</th>                     
                <th>Stok</th>                     
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>       
            <?php 
                $no = 1;
                if(isset($products)){
                foreach($products as $product){
            ?>    
            <tr>
                <td><?= $no ?></td>
                <td><?= $product['merchant'] ?></td>
                <td><?= $product['id_produk'] ?></td>
                <td><?= $product['nama_produk'] ?></td>
                <td><?= $product['id_kategori'] ?></td>
                <td><?= $product['ket_produk'] ?></td>                        
                <td><?= $product['stok_produk'] ?></td>
                <td><?= $product['harga_produk'] ?></td>
                <td>
                    <button><a href="<?= base_url("admin/home/update_product/") . $product['id_produk'] ?>">Edit</a></button>
                    <button><a href="<?= base_url("admin/home/delete_product/") . $product['id_produk'] ?>">Delete</a></button>
                </td>
            </tr>                   
            <?php $no++; }} ?>
        </tbody>
            </table>


</body>
</html>