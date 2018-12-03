<?php
include('baglan.php');
if($_POST['id'])
{
    $id=$_POST['id'];
    $sinif = $baglanti->query("SELECT * FROM ders WHERE id='".$id."'");
    while ($siniflar = $sinif->fetch_assoc()){
        $id = $siniflar['id'];
        $deger1 = $siniflar['derslik'];
        echo "<option>$deger1</option>";
    }
}
?>