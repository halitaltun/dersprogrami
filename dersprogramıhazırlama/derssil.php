<?php
    if ($_GET)
    {
        include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

        // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
        if ($baglanti->query("DELETE FROM ders WHERE id =".(int)$_GET['id']))
        {
            header("location:ders.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
        }
    }
?>