<h1>Transaksi</h1>

<?php
$cookie_name = "id_produk";

if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     echo "Cookie '" . $cookie_name . "' is set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<button><a href="<?php 
              setcookie('id_produk', "", time() - (86400 * 30), "/", false);
              echo site_url('customer/transaksi/transaksi');?>">Reset id Produk</a>
</button>