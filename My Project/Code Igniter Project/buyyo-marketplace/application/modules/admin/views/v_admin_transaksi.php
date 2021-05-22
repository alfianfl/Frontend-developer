<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Transaksi</title>
</head>
<body>
    <h1>List History Transaksi</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Transaksi</th>
                <th>Kuantitas</th>
                <th>Waktu</th>
                <th>Catatan</th>
                <th>Id Produk</th>                     
                <th>Customer</th>                     
                <th>Id Keranjang</th>
            </tr>
        </thead>
        <tbody>       
            <?php 
                $no = 1;
                if(isset($transactions)){
                foreach($transactions as $transaction){
            ?>    
            <tr>
                <td><?= $no ?></td>
                <td><?= $transaction['id_transaksi'] ?></td>
                <td><?= $transaction['kuantitas'] ?></td>
                <td><?= $transaction['waktu'] ?></td>
                <td><?= $transaction['catatan'] ?></td>
                <td><?= $transaction['id_produk'] ?></td>                        
                <td><?= $transaction['customer'] ?></td>  
                <td><?= $transaction['id_keranjang'] ?></td>
            </tr>                   
            <?php $no++; }} ?>
        </tbody>
            </table>
</body>
</html>