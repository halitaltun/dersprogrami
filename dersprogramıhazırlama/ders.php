<?php
include("baglan.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ders Ekleme</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/ogretimelemani.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="header-top">
            <img class="logo" src="img/sivas_cumhuriyet_universitesi_logo_2018.png">
            <nav class="girismenu">
                <ul>
                    <li><a href="http://www.cumhuriyet.edu.tr/">Hakkında</a></li>
                    <li><a href="http://www.cumhuriyet.edu.tr/index.php?cubid=9">İLETİŞİM</a></li>
                    <li><a href="kullanicigiris.php">Çıkış Yap</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content">
        <h1>Ders İşlemleri</h1>
    </div>
</header>
<section id="ders">
    <div class="container">
        <form action="" method="post">
            Kodu <input name="derskodu" type="text" placeholder="Ders Kodu">
            Adı <input name="dersadı" type="text" placeholder="Ders Adı">
            Ders Saati
            <?php
            $derssaat = array("1","2","3","4");
            echo "<select name='saat'>";
            echo "<option>Saat Seçiniz</option>";
            foreach ($derssaat as $anahtar=>$deger){
                echo "<option>$deger</option>";
            }
            echo "</select>";
            ?>
            Sınıf
            <?php
            $siniflar = $baglanti->query("SELECT * FROM sinif");
            echo "<select name='sinif'>";
            echo "<option>Sınıf Seçiniz</option>";
            while ($sinif = $siniflar->fetch_assoc()){
                $deger = $sinif['siniflar'];
                echo "<option>$deger</option>";
            }
            echo "</select>";
            ?>
            Derslik
            <?php
            $derslikler = $baglanti->query("SELECT * FROM derslik");
            echo "<select name='derslik'>";
            echo "<option>Derslik Seçiniz</option>";
            while ($derslik = $derslikler->fetch_assoc()){
                $deger = $derslik['derslikler'];
                echo "<option>$deger</option>";
            }
            echo "</select>";
            ?>
            Öğretim Elemani
            <?php
            $ogretimelemanları = $baglanti->query("SELECT * FROM ogretimelemani");
            echo '<select name="ogretimelemani">';
            echo "<option>Öğretim Elemanı Seçiniz</option>";
            while ($son = $ogretimelemanları->fetch_assoc()){
                $unvan = $son['unvan'];
                $ad = $son['ad'];
                $soyad = $son['soyad'];
                echo "<option>$unvan $ad $soyad</option>";
            }
            echo "</select>";
            ?>
            <input type="submit" value="Ekle" class="btn btn-primary" formaction="dersekle.php">
            <input type="submit" value="Geri Dön" class="btn btn-danger" formaction="sayfagiris.html">
        </form>
    </div>

    <!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
    <div>
        <table class="table">

            <tr>
                <th>Kodu</th>
                <th>Adı</th>
                <th>Ders Saati</th>
                <th>Sınıf</th>
                <th>Derslik</th>
                <th>Öğretim Elemani</th>
                <th></th>
                <th></th>
            </tr>

            <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

            <?php
            $sorgu = $baglanti->query("SELECT * FROM ders"); // ders tablosundaki tüm verileri çekiyoruz.

            while ($sonuc = $sorgu->fetch_assoc()) {
                $id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
                $derskodu = $sonuc['derskodu'];
                $dersadi = $sonuc['dersadı'];
                $saat = $sonuc['saat'];
                $sinif = $sonuc['sinif'];
                $derslik = $sonuc['derslik'];
                $ogretimelemani = $sonuc['ogretimelemani'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz.
                ?>

                <tr>
                    <td><?php echo $derskodu; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
                    <td><?php echo $dersadi; ?></td>
                    <td><?php echo $saat; ?></td>
                    <td><?php echo $sinif; ?></td>
                    <td><?php echo $derslik; ?></td>
                    <td><?php echo $ogretimelemani; ?></td>
                    <td><a href="dersguncelle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
                    <td><a href="derssil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
                </tr>

                <?php
            }
            // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
            ?>

        </table>
    </div>
</section>
</body>
</html>