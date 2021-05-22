<form action="<?= base_url("/customer/home/profile_action")?>" method="post" enctype="multipart/form-data">
    Nama: <input type="text" name="nama_user" id="nama_user"><br>
    Nama Merchant: <input type="text" name="nama_merchant" id="nama_merchant"><br>
    Alamat: <input type="text" name="alamat" id="alamat"><br>
    Alamat Pengiriman: <input type="text" name="alamat_pengiriman" id="alamat_pengiriman"><br>
    Alamat Penjemputan: <input type="text" name="alamat_penjemputan" id="alamat_penjemputan"><br>
    Upload Foto: <input type="file" name="foto" class="file" accept="image/*"><br>
    No HP: <input type="text" name="no_hp" id="no_hp"><br>
    <input type="submit">
</form>