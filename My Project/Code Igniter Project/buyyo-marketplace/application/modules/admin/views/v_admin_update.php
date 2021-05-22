<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Produk</title>
</head>
<body>
<?php foreach($product as $item): ?>  
    <h1>Update Data</h1>
    <form action="<?= base_url("admin/home/update_product_action") ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?= $item['id_produk']; ?>">
        <input type="hidden" name="merchant" value="<?= $item['merchant']; ?>">
        Nama: <input type="text" name="nama_produk" id="nama" value="<?= $item['nama_produk']; ?>"><br>
        Deskripsi:<br> <textarea class="form-control" id="deskripsi" rows="3" name="ket_produk"><?= $item['ket_produk']; ?></textarea><br>
        
        Kategori: <select name="id_kategori">
        <option value="" selected disabled>Choose Here</option>
        <?php foreach($category as $cat): ?>
            <option value=<?= $cat['id_kategori'];?> <?=($item['id_kategori'] == $cat['id_kategori'])? 'selected':'' ?>><?= $cat['nama_kategori']; ?></option>
        <?php endforeach ?>
        </select><br>

        Harga: <input type="text" name="harga_produk" id="Harga" placeholder="Rp." value="<?= $item['harga_produk']; ?>"><br>
        Stock: <input type="text" name="stok_produk" id="stock" placeholder="" value="<?= $item['stok_produk']; ?>"><br>
        Upload File: <input type="file" name="gambar1" class="file" accept="image/*"><br>
            <input type="hidden" name="old_gambar1" value="<?= $item['gambar1']; ?>">
            <input type="hidden" name="kondisi_produk" value="<?= $item['kondisi_produk']; ?>">
            <input type="submit" value="Simpan">
    <?php endforeach; ?>

    </form>
</body>
</html>