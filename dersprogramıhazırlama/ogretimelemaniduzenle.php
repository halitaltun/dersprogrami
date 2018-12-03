<?php
include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğretim Elemanı Düzenle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/ogretimelemani.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300" rel="stylesheet">
</head>
<body>

<?php
    $sorgu = $baglanti->query("SELECT * FROM ogretimelemani WHERE sicilno =".(int)$_GET['sicilno']);
    //sicilno değeri ile düzenlenecek verileri veritabanından alacak sorgu
    $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
?>

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
        <h1>Yeni Bilgileri Giriniz</h1>
    </div>
    </div>
    </div>
</header>

<section id="ogretimelemani">
    <div class="container">
        <form action="" method="post">
            Sicil No <input  name="sicilno" type="text" value="<?php echo $sonuc['sicilno'];
            // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            Ünvan
            <?php
            $unvanlar = array("Doç. Dr.","Yrd. Doç. Dr.","Araş. Gör. Dr.","Araş. Gör.","Öğr. Gör.");
            echo "<select name='unvan'>";
            $deger1 = $sonuc['unvan'];
            echo "<option>$deger1</option>";
            foreach ($unvanlar as $anahtar=>$deger){
                if($deger != $deger1) {
                    echo "<option>$deger</option>";
                }
            }
            echo "</select>";
            ?>
            İsim <input  name="ad" type="text" value="<?php echo $sonuc['ad'];?>">
            Soyisim <input  name="soyad" type="text" value="<?php echo $sonuc['soyad'];?>">
            <input type="submit" value="Düzenle" class="btn btn-primary">
            <input type="submit" value="Geri Dön" class="btn btn-danger" formaction="ogretimelemani.php">
        </form>

    </div>

    <?php

    if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

        $sicilno=$_POST["sicilno"];
        $unvan=$_POST["unvan"];
        $ad=$_POST["ad"];
        $soyad=$_POST["soyad"];

        if ($sicilno=="" || $unvan=="" || $ad=="" || $soyad=="") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
            // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
            $hata="<script>alert('Boş alan bırakmayınız!')</script>";
            echo $hata;
            header("Refresh:0.1; url=ogretimelemaniduzenle.php");
        }
        else{
            // Veri güncelleme sorgumuzu yazıyoruz.
            if ($baglanti->query("UPDATE ogretimelemani SET sicilno = '$sicilno', unvan = '$unvan', ad = '$ad', soyad = '$soyad' WHERE sicilno =".$_GET['sicilno']))
            {
                // Eğer güncelleme sorgusu çalıştıysa ogretimelemaniekle.php sayfasına yönlendiriyoruz.
                $hata="<script>alert('Bilgiler Başarıyla Düzenlenedi.')</script>";
                echo $hata;
                header("Refresh:0.1; url=ogretimelemani.php");
            }

            else
            {
                echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
            }
        }
    }
    ?>

    </table>
    </div>
</section>

</body>
</html>