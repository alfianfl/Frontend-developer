<script>
    function setCookie(cname,cvalue,exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var pembayaran = getCookie("pembayaran");
        var keranjang = getCookie("ketanjang");
        var transaksi = getCookie("transaksi");
        
        if (pembayaran != "") {
            alert(pembayaran);
        } else {
            alert("pembayaran is not set");
        }

        if(keranjang != ""){
            alert(keranjang)
        } else{
            alert("keranjang is not set")
        }

        if(transaksi != ""){
            alert(transaksi);
        }else{
            alert("transaksi is not set");
        }
    }

</script>
<body onload="checkCookie()">
    <h1>TestCookies</h1>

    <form action="<?= base_url("/customer/TestCookie/cookie_action")?>">
            id_user: <input type="number" name="id_user" id="id_user"><br>
            metode_pembayaran: <input type="text" name="metode_pembayaran" id="metode_pembayaran"><br>
            id_pembayaran: <input type="number" name="id_pembayaran" id="id_pembayaran"><br>
            kuantitas: <input type="number" name="kuantitas" id="kuantitas"><br>
            catatan: <input type="text" name="catatan" id="catatan"><br>
            id_produk: <input type="number" name="id_produk" id="id_produk"><br>
            id_keranjang: <input type="number" name="id_keranjang" id="id_keranjang"><br>
            <input type="submit">
    </form>

    <button onclick="setCookie('pembayaran','<?php serialize($pembayaran)?>',1)"><a href="<?php echo site_url('customer/testcookie');?>">Set Pembayaran Cookie</a></button>
    <button onclick="setCookie('keranjang','<?php serialize($keranjang)?>',1)"><a href="<?php echo site_url('customer/testcookie');?>">Set Keranjang Cookie</a></button>
    <button onclick="setCookie('transaksi','<?php serialize($transaksi)?>',1)"><a href="<?php echo site_url('customer/testcookie');?>">Set Transaksi Cookie</a></button>
    <button onclick="setCookie('transaksi','<?php echo serialize($transaksi)?>',-1);setCookie('keranjang','<?php echo serialize($keranjang)?>',-1);setCookie('pembayaran','<?php echo serialize($pembayaran)?>',-1) "><a href="<?php echo site_url('customer/TestCookie');?>">Delete Cookie</a></button>

</body>