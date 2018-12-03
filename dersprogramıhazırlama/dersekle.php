<?php
include ("baglan.php");
if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    //$id = $_POST['id'];
    $derskodu = $_POST['derskodu'];
    $dersadi = $_POST['dersadı'];
    $saat = $_POST['saat'];
    $sinif = $_POST['sinif'];
    $derslik = $_POST['derslik'];
    $ogretimelemani = $_POST['ogretimelemani'];

    if ($derskodu=="" || $dersadi=="" || $saat=="" || $sinif=="" || $derslik=="" || $ogretimelemani=="") {
        // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        $hata="<script>alert('Boş alan bırakmayınız!')</script>";
        echo $hata;
        header("Refresh:0.1; url=ders.php");
    }
    else{
        $sqlkontrol="SELECT * FROM ders WHERE dersadı='$dersadi'";
        $kontrol=mysqli_query($baglanti,$sqlkontrol);
        if(mysqli_num_rows($kontrol)>0){
            $hata="<script>alert('Bu İsimde Ders Bulunmaktadır!')</script>";
            echo $hata;
            header("Refresh:0.1; url=ders.php");
        }
        else{
            // Veri ekleme sorgumuzu yazıyoruz.
            if ($baglanti->query("INSERT INTO ders (derskodu, dersadı, sinif, derslik, ogretimelemani, saat) VALUES ('$derskodu','$dersadi', '$sinif', '$derslik', '$ogretimelemani', '$saat')"))
            {
                // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                $hata="<script>alert('Bilgiler Başarıyla Kaydedildi.')</script>";
                echo $hata;
                header("Refresh:0.1; url=ders.php");
            }
            else
            {
                echo "<h3>Hata oluştu!</h3>";
            }
        }

    }
}
?>