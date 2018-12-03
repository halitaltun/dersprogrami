<?php
include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Öğretim Elemanı Ekleme</title>
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
        <h1>Öğretim Elemanları</h1>
    </div>
</header>
<section id="ogretimelemani">
    <div class="container">
        <form action="" method="post">
            Sicil No <input  name="sicilno" type="text" placeholder="Sicil No">
            Ünvan
            <?php
            $unvanlar = array("Doç. Dr.","Yrd. Doç. Dr.","Araş. Gör. Dr.","Araş. Gör.","Öğr. Gör.");
            echo "<select name='unvan'>";
            echo "<option>Ünvan Seçiniz</option>";
            foreach ($unvanlar as $anahtar=>$deger){
                echo "<option>$deger</option>";
            }
            echo "</select>";
            ?>
            İsim <input  name="ad" type="text" placeholder="İsim">
            Soyisim <input  name="soyad" type="text" placeholder="Soyisim">
            <input type="submit" value="Ekle" class="btn btn-primary" formaction="ogretimelemaniekle.php">
            <input type="submit" value="Geri Dön" class="btn btn-danger" formaction="sayfagiris.html">
        </form>
    </div>
    <!-- ############################################################## -->

    <!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
    <div>
        <table class="table">

            <tr>
                <th>Sicilno</th>
                <th>Ünvan</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th></th>
                <th></th>
            </tr>

            <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

            <?php
            $sorgu = $baglanti->query("SELECT * FROM ogretimelemani"); // Makale tablosundaki tüm verileri çekiyoruz.

            while ($sonuc = $sorgu->fetch_assoc()) {
                //$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
                $sicilno = $sonuc['sicilno'];
                $unvan = $sonuc['unvan'];
                $ad = $sonuc['ad'];
                $soyad = $sonuc['soyad'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz.
                ?>

                <tr>
                    <td><?php echo $sicilno; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
                    <td><?php echo $unvan; ?></td>
                    <td><?php echo $ad; ?></td>
                    <td><?php echo $soyad; ?></td>
                    <td><a href="ogretimelemaniduzenle.php?sicilno=<?php echo $sicilno; ?>" class="btn btn-primary">Düzenle</a></td>
                    <td><a href="ogretimelemanisil.php?sicilno=<?php echo $sicilno; ?>" class="btn btn-danger">Sil</a></td>
                </tr>

                <?php
            }
            // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
            ?>

        </table>
    </div>
    </div>
</section>
</body>
</html>