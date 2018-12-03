<?php
include ("baglan.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Giriş</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/kullanici.css">
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

                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content">
        <h1>Kullanıcı Giriş</h1>
    </div>
</header>
<section id="ders">
    <div class="container">
        <form action="" method="post">
            <h3>Kullanıcı Adı</h3>
            <input  name="kullaniciadi" type="text" placeholder="Kullanıcı Adı">
            <h3>Şifre</h3>
            <input  name="sifre" type="password" placeholder="Şifre">
            <p>
            <input type="submit" value="Giriş Yap" class="giris">
            </p>
        </form>

        <?php
        if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
            $kullaniciad = $_POST["kullaniciadi"];
            $sifre = $_POST["sifre"];

            if($kullaniciad=="" || $sifre==""){
                $hata="<script>alert('Boş alan bırakmayınız')</script>";
                echo $hata;
                header("Refresh:0.1; url=kullanicigiris.php");
            }
            else{
                $sqlkontrol="SELECT * FROM kullanici WHERE kullaniciadi='$kullaniciad' and  sifre='$sifre'";
                $kontrol=mysqli_query($baglanti,$sqlkontrol);
                if(mysqli_num_rows($kontrol)>0){
                    $_SESSION["kullaniciadi"]=$kullaniciad;
                    @header("location:sayfagiris.html");
                }
                else{
                    $hata="<script>alert('Kullanıcı adı veye Şifre hatalı')</script>";
                    echo $hata;
                    header("Refresh:0.1; url=kullanicigiris.php");
                }
            }
        }
        ?>
    </div>
</section>
</body>
</html>