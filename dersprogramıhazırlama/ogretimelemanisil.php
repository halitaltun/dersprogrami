<?php
    if ($_GET)
    {
        include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

    // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
        if ($baglanti->query("DELETE FROM ogretimelemani WHERE sicilno =".(int)$_GET['sicilno']))
        {
            header("location:ogretimelemani.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
        }
    }
?>