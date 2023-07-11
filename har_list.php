<?php require_once 'partials/header.php';?>

<?php 

$id = $_GET['id'];

//selecting data associated with this particular id
$Sonuc_carihrk = mysqli_query($baglan,
"SELECT carihrk.id,carihrk.tarih,carihrk.belge_no,kayit_tipi.kaytip_adi,carihrk.vadesi,carihrk.aciklama,carihrk.borc,carihrk.alacak FROM carihrk,kayit_tipi WHERE (carihrk.ckod_id=$id) AND (carihrk.kayit_tip=kayit_tipi.kaytip_id) ORDER BY carihrk.tarih");



$Sonuc_carikrt = mysqli_query($baglan,"SELECT * from carikrt WHERE (id=$id)");

if (mysqli_num_rows($Sonuc_carikrt) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Sonuc_carikrt)) { 
?>

<div class="row">

<?php 
echo "<a class='btn btn-primary' href='fatura.php?id=$row[id]'>Fatura</a>" ?> 
<?php 
echo "<a class='btn btn-primary' href='kasa.php?id=$row[id]'>Kasa</a>" ?> 
<?php 
echo "<a class='btn btn-primary' href='cekler.php?id=$row[id]'>Çekler</a>" ?> 
</div>



    <div class="row">
     <h1 class="tac">Cari Hareket Dökümü</h1>      
    </div>
 
<div class="row">
    <br>
    Cari Kodu  : <?php echo $row["ckod"] ?> <br>
    Cari İsim  : <?php echo $row["cisim"] ?> <br>
<?php  
    }

 } 
    ?>
   
    </div>
    
<div class="row">

   
    <table class="table_har_list">
        <tr>
            <th>Tarih</td>
            <th>Belge No.</td>
            <th>Belge Tipi</td>
            <th>Vadesi</td>
            <th>Açıklama</td>
            <th>Borç</td>
            <th>Alacak</td>
            <th>İşlem</td>
        </tr>

        <?php 

while($res = mysqli_fetch_array($Sonuc_carihrk)) { 

    $formatB= number_format($res['borc'],2);
    $formatA= number_format($res['alacak'],2);

    $date_=date_create($res['tarih']);
    $trh = date_format($date_,"d/m/Y");

    $datevd=date_create($res['vadesi']);
    $vdtrh = date_format($datevd,"d/m/Y");


    
    echo "<tr>";
    echo "<td class='tac'>".$trh."</td>";
    echo "<td>".$res['belge_no']."</td>";
    echo "<td>".$res['kaytip_adi']."</td>";
    echo "<td class='tac'>".$vdtrh."</td>";
    echo "<td>".$res['aciklama']."</td>";
    echo "<td class='num';>".$formatB."</td>";	
    echo "<td class='num';>".$formatA."</td>";	
    echo "<td><a class='btn btn-danger' href='hareket.php?id=$res[id]'>Düzenle</a>
    <a class='btn btn-danger' href='hareket.php?id=$res[id]'>Sil</a></td>";
    echo "</tr>";	
}
?>
</table>
</div>

<div class="row">
<div class="col-75">

</div>
<div class="col-25">


<?php

$sql3 =mysqli_query($baglan, "SELECT ckod_id, SUM(borc) AS borc_,SUM(alacak) AS alacak_, SUM(borc-alacak) AS bakiye_ FROM carihrk GROUP BY ckod_id");

if (mysqli_num_rows($sql3) > 0) {
while($kay=mysqli_fetch_assoc($sql3)){

$ckod_id=$kay['ckod_id'];
$ckod_id=$id;

$borc_t=number_format($kay['borc_'],2);
$alacak_t=number_format($kay['alacak_'],2);



}
}


?>


<table class="table_har_list">
    <tr>
      <td style="width: 100px;">Toplam Borç : </td>
      <td class="num" style="width: 100px;"><?php echo $borc_t ?></td>
    </tr>
    <tr>
      <td style="width: 100px;">Toplam Alacak :</td>
      <td class="num" style="width: 100px;"><?php echo $alacak_t?></td>
    </tr>
    <tr>
      <td>Bakiye :</td>
      <td><?php echo $borc_t-$alacak_t?></td>
    </tr>

</table>

</div>








<?php  require_once 'partials/footer.php';?>
