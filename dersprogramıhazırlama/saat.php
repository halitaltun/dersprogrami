<?php
include('baglan.php');
if($_POST['id'])
{
    $id=$_POST['id'];
    if($id==1)
    {
        $derssaat = $baglanti->query("SELECT * FROM saat ");
        echo "<option>Saat Seçiniz</option>";
        while ($saat = $derssaat->fetch_assoc()){
            $id = $saat['id'];
            $deger = $saat['derssaati'];
            echo "<option>$deger</option>";
        }
    }
    else if($id==2){
        $derssaatg = $baglanti->query("SELECT * FROM gecesaat");
        echo "<option>Saat Seçiniz</option>";
        while ($gecesaat = $derssaatg->fetch_assoc()){
            $id = $gecesaat['id'];
            $deger = $gecesaat['geceders'];
            echo "<option value='$id'>$deger</option>";
        }
    }
}
?>