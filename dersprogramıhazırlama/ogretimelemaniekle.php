<?php
include ("baglan.php");
if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $sicilno = $_POST['sicilno'];
    $unvan = $_POST['unvan'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];

    if ($sicilno=="" || $unvan=="Ünvan Seçiniz" || $ad=="" || $soyad=="") {
        // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        $hata="<script>alert('Boş alan bırakmayınız!')</script>";
        echo $hata;
        header("Refresh:0.1; url=ogretimelemani.php");
    }
    else{
        $sqlkontrol="SELECT * FROM ogretimelemani WHERE sicilno='$sicilno'";
        $kontrol=mysqli_query($baglanti,$sqlkontrol);
        if(mysqli_num_rows($kontrol)>0){
            $hata="<script>alert('Bu Sicil Nosu Kullanılmaktadır!')</script>";
            echo $hata;
            header("Refresh:0.1; url=ogretimelemani.php");
        }
        else{
            // Veri ekleme sorgumuzu yazıyoruz.
            if ($baglanti->query("INSERT INTO ogretimelemani (sicilno, unvan, ad, soyad) VALUES ('$sicilno','$unvan', '$ad', '$soyad')"))
            {
                // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                $hata="<script>alert('Bilgiler Başarıyla Kaydedildi.')</script>";
                echo $hata;
                header("Refresh:0.1; url=ogretimelemani.php");
            }
            else
            {
                echo "<h3>Hata Oluştu!</h3>";
            }
        }
    }
}
?>