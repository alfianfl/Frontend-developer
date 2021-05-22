<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Merchant</title>
</head>
<body>
    <h1>Admin Merchant Page Placeholder</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id user</th>
                <th>username</th>
                <th>email</th>
                <th>Nama User</th>
                <th>Nama Merchant</th>                     
                <th>Alamat</th>                     
                <th>Alamat Pengiriman</th>
                <th>Alamat Penjemputan</th>
            </tr>
        </thead>
        <tbody>       
            <?php 
                $no = 1;
                if(isset($merchants)){
                foreach($merchants as $merchant){
            ?>    
            <tr>
                <td><?= $no ?></td>
                <td><?= $merchant['id_user'] ?></td>
                <td><?= $merchant['username'] ?></td>
                <td><?= $merchant['email'] ?></td>
                <td><?= $merchant['nama_user'] ?></td>
                <td><?= $merchant['nama_merchant'] ?></td>                        
                <td><?= $merchant['alamat'] ?></td>  
                <td><?= $merchant['alamat_pengiriman'] ?></td>
                <td><?= $merchant['alamat_penjemputan'] ?></td>
            </tr>                   
            <?php $no++; }} ?>
        </tbody>
            </table>
</body>
</html>