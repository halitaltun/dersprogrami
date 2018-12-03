<?php
include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ders Düzenle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/ogretimelemani.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300" rel="stylesheet">
</head>
<body>

<?php
    $sorgu = $baglanti->query("SELECT * FROM ders WHERE id =".(int)$_GET['id']);
    //id değeri ile düzenlenecek verileri veritabanından alacak sorgu
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
            Kodu <input  name="derskodu" type="text" value="<?php echo $sonuc['derskodu'];
            // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            Adı <input  name="dersadı" type="text" value="<?php echo $sonuc['dersadı'];?>">
            Ders Saati
            <?php
            $derssaat = array("1","2","3","4");
            echo "<select name='saat'>";
            $deger1 = $sonuc['saat'];
            echo "<option>$deger1</option>";
            foreach ($derssaat as $anahtar=>$deger){
                if($deger != $deger1){
                    echo "<option>$deger</option>";
                }
            }
            echo "</select>";
            ?>
            Sınıf
            <?php
            $siniflar = $baglanti->query("SELECT * FROM sinif");
            echo "<select name='sinif'>";
            $deger1 = $sonuc['sinif'];
            echo "<option>$deger1</option>";
            while ($sinif = $siniflar->fetch_assoc()){
                $deger = $sinif['siniflar'];
                if($deger != $deger1){
                    echo "<option>$deger</option>";
                }
            }
            echo "</select>";
            ?>
            Derslik
            <?php
            $derslikler = $baglanti->query("SELECT * FROM derslik");
            echo "<select name='derslik'>";
            $deger1 = $sonuc['derslik'];
            echo "<option>$deger1</option>";
            while ($derslik = $derslikler->fetch_assoc()){
                $deger = $derslik['derslikler'];
                if($deger != $deger1){
                    echo "<option>$deger</option>";
                }
            }
            echo "</select>";
            ?>
            Öğretim Elemani
            <?php
            $ogretimelemanları = $baglanti->query("SELECT * FROM ogretimelemani");
            echo '<select name="ogretimelemani">';
            $deger1 = $sonuc['ogretimelemani'];
            echo "<option>$deger1</option>";
            while ($son = $ogretimelemanları->fetch_assoc()){
                $unvan = $son['unvan'];
                $ad = $son['ad'];
                $soyad = $son['soyad'];
                if($deger != $deger1) {
                    echo "<option>$unvan $ad $soyad</option>";
                }
            }
            echo "</select>";
            ?>
            <input type="submit" value="Düzenle" class="btn btn-primary">
            <input type="submit" value="Geri Dön" class="btn btn-danger" formaction="ders.php">
        </form>

    </div>

    <?php

    if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

        $id = $_POST['id'];
        $derskodu = $_POST['derskodu'];
        $dersadi = $_POST['dersadı'];
        $saat = $_POST['saat'];
        $sinif = $_POST['sinif'];
        $derslik = $_POST['derslik'];
        $ogretimelemani = $_POST['ogretimelemani'];

        if ($derskodu=="" || $dersadi=="" || $saat=="" || $sinif=="" || $derslik=="" || $ogretimelemani=="") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
            $hata="<script>alert('Boş alan bırakmayınız!')</script>";
            echo $hata;
            header("Refresh:0.1; url=dersguncelle.php");
        }
        else{
            // Veri güncelleme sorgumuzu yazıyoruz.
            if ($baglanti->query("UPDATE ders SET derskodu = '$derskodu', dersadı = '$dersadi', sinif = '$sinif', derslik = '$derslik', ogretimelemani = '$ogretimelemani', saat = '$saat' WHERE id =".$_GET['id']))
            {
                $hata="<script>alert('Bilgiler Başarıyla Düzenlenedi.')</script>";
                echo $hata;
                header("Refresh:0.1; url=ders.php");
                // Eğer güncelleme sorgusu çalıştıysa dersekle.php sayfasına yönlendiriyoruz.
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
