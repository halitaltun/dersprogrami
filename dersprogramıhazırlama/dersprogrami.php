<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".ogretimler").change(function()
        {
            var id=$(this).val();
            var dataString = 'id='+ id;

            $.ajax
            ({
                type: "POST",
                url: "saat.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".derssaati").html(html);
                }
            });

        });

    });
    $(document).ready(function ()
    {
        $(".ders").change(function ()
        {
            var id=$(this).val();
            var dataString = 'id='+ id;
            $.ajax
            ({
                type: "POST",
                url: "sinif.php",
                data: dataString,
                cache: false,
                success: function (html)
                {
                    $(".sinif").html(html);
                }
            });
        });
    });
    $(document).ready(function ()
    {
        $(".ders").change(function ()
        {
            var id=$(this).val();
            var dataString = 'id='+ id;
            $.ajax
            ({
                type: "POST",
                url: "derslik.php",
                data: dataString,
                cache: false,
                success: function (html)
                {
                    $(".derslik").html(html);
                }
            });
        });
    })
</script>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ders Programı Hazırlama</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
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
        <h1>Ders Programı</h1>
    </div>
</header>
<section id="ders">
    <div class="container">
        <form action="" method="post">
            Öğretim
            <select name="ogretimler" class="ogretimler">
                <option selected="selected">Öğretim Seçiniz</option>
                <?php
                include('baglan.php');
                $ogretim = $baglanti->query("SELECT * FROM  ogretim");
                while ($ogr = $ogretim->fetch_assoc()){
                    $id = $ogr['id'];
                    $ogr1 = $ogr['ogretimler'];
                    echo "<option value='$id'>$ogr1</option>";
                }
                ?>
            </select>
            Gün
            <select name="dersgunleri">
                <option>Gün Seçiniz</option>
                <?php
                    $gun = $baglanti->query("SELECT * FROM gunler");
                    while ($gunler = $gun->fetch_assoc()){
                        $dersgun = $gunler['dersgunleri'];
                        echo "<option>$dersgun</option>";
                    }
                ?>
            </select>
            Saat
            <select name="derssaati" class="derssaati">
                <option selected="selected"></option>
            </select>
            Ders
            <select name="ders" class="ders">
                <option selected="selected">Ders Seçiniz</option>
                <?php
                $ders = $baglanti->query("SELECT * FROM ders");
                while ($dersler = $ders->fetch_assoc()){
                    $id = $dersler['id'];
                    $ders1 = $dersler['dersadı'];
                    echo "<option value='$id'>$ders1</option>";
                }
                ?>
            </select>
            Sınıf
            <select name="sinif" class="sinif">
                <option selected="selected"></option>
            </select>
            Derslik
            <select name="derslik" class="derslik">
                <option selected="selected"></option>
            </select>
            <input type="submit" value="Ekle" class="btn btn-primary">
            <input type="submit" value="Geri Dön" class="btn btn-danger" formaction="sayfagiris.html">
        </form>

        <?php

        if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
            $ogretim = $_POST['ogretimler'];
            $gunler = $_POST['dersgunleri'];
            $sinif = $_POST['sinif'];
            $saat = $_POST['derssaati'];
            $dersadi = $_POST['ders'];
            $derslik = $_POST['derslik'];

            if ($ogretim=="" || $gunler=="" ||  $sinif=="" || $saat=="" || $dersadi=="" ||$derslik=="") {
                // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
                $hata="<script>alert('Boş alan bırakmayınız!')</script>";
                echo $hata;
                header("Refresh:0.1; url=dersprogrami.php");
            }
            else{
                $sqlkontrol="SELECT * FROM dersprogrami1 WHERE gun='$gunler' AND saat='$saat'";
                $kontrol=mysqli_query($baglanti,$sqlkontrol);
                if(mysqli_num_rows($kontrol)>0){
                    $hata="<script>alert('Bu İsimde Ders Bulunmaktadır!')</script>";
                    echo $hata;
                    header("Refresh:0.1; url=dersprogrami.php");
                }
                else{
                    // Veri ekleme sorgumuzu yazıyoruz.
                    if ($baglanti->query("INSERT INTO dersprogrami1 (ogretim, gun, saat, sinif, dersadi, derslik) VALUES ('$ogretim','$gunler', '$saat', '$sinif', '$dersadi', '$derslik')"))
                    {
                        // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                        $hata="<script>alert('Bilgiler Başarıyla Kaydedildi.')</script>";
                        echo $hata;
                        header("Refresh:0.1; url=dersprogrami.php");
                    }
                    else
                    {
                        echo "<h3>Hata oluştu!</h3>";
                    }
                }
            }
        }
        ?>
    </div>
    <div>
        <table border="1">
            <?php
            $ogretim = $baglanti->query("SELECT *FROM ogretim");
            while ($ogretimler = $ogretim->fetch_assoc()) {
                $deger = $ogretimler['ogretimler'];
                $ogretimid = $ogretimler['id'];
                echo "<tr>";
                echo "<td colspan='2'>$deger</td>";
                $sinif = $baglanti->query("SELECT * FROM sinif");
                while ($siniflar = $sinif->fetch_assoc()) {
                    $deger1 = $siniflar['siniflar'];
                    echo "<td colspan='2'>$deger1</td>";
                }
                echo "</tr>";
                echo "<td></td>";
                echo "<td>Saat</td>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>Ders Adi</td>";
                    echo "<td>Derslik</td>";
                }
                $gun = $baglanti->query("SELECT * FROM gunler");
                while ($gunler = $gun->fetch_assoc()) {
                    $deger2 = $gunler['dersgunleri'];
                    echo "<tr><td rowspan='9'>$deger2</td></tr>";
                    if ($ogretimid==1) {
                        $saat = $baglanti->query("SELECT * FROM saat");
                        while ($saatlar = $saat->fetch_assoc()) {
                            $deger3 = $saatlar['derssaati'];
                            echo "<tr>";
                            echo "<td>$deger3</td>";
                            for ($k = 0; $k < 8; $k++) {
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                    }
                    else {
                        $gecesaat = $baglanti->query("SELECT * FROM gecesaat");
                        while ($gecesaatlar = $gecesaat->fetch_assoc()) {
                            $deger4 = $gecesaatlar['geceders'];
                            echo "<tr>";
                            echo "<td>$deger4</td>";
                            for ($l = 0; $l < 8; $l++) {
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                    }
                    echo "<td></td>";
                }
            }
            ?>
        </table>
    </div>
</section>
</body>
</html>