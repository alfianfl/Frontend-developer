<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
            <p>Hello, <?= $user ?></p>
            <?php if($this->session->userdata('admintoken')) { ?>
                <a href="<?= base_url("admin/auth/logout") ?>" >Logout</a>
                <a href="<?= base_url("admin/home/produk")?>" >Action Product</a>
                <a href="<?= base_url("admin/home/merchant")?>">Data Merchant</a>
                <a href="<?= base_url("admin/home/transaksi")?>">Transaksi Sukses</a>
            <?php } else { ?>
                <a href="<?= base_url("admin/auth/login") ?>" class="dropdown-item">Login</a>
            <?php } ?>
        </div>
    </div>
</body>
</html>