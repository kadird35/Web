<?php require_once '_header.php';

$id = $_GET['id'];

//selecting data associated with this particular id
$Sonuc_carihrk = mysqli_query($baglan,
"SELECT carihrk.id,carihrk.tarih,carihrk.belge_no,kayit_tipi.kaytip_adi,carihrk.vadesi,carihrk.aciklama,carihrk.borc,carihrk.alacak FROM carihrk,kayit_tipi WHERE (carihrk.ckod_id=$id) AND (carihrk.kayit_tip=kayit_tipi.kaytip_id) ORDER BY carihrk.tarih");



$Sonuc_carikrt = mysqli_query($baglan,"SELECT * from carikrt WHERE (id=$id)");

if (mysqli_num_rows($Sonuc_carikrt) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Sonuc_carikrt)) { 
?>



<div class="container2">
<div class="baslik"  id="glb" >
   <?php echo "<a href='fatura.php?id=$row[id]' class='button'>Fatura</a>" ?> 
   <?php echo "<a href='kasa.php?id=$row[id]' class='button'>Kasa</a>" ?> 
   <?php echo "<a href='cekler.php?id=$row[id]' class='button'>Çekler</a>" ?> 


    <br>
    Cari Kodu  : <?php echo $row["ckod"] ?> <br>
    Cari İsim  : <?php echo $row["cisim"] ?> <br>
<?php  
    }

 } 
    ?>
    
</div>
        

    
    <table id="table_har_list">
        <tr>
            <th style="width: 80px;">Tarih</td>
            <th style="width: 100px;">Belge No.</td>
            <th style="width: 100px;">Belge Tipi</td>
            <th style="width: 100px;">Vadesi</td>
            <th style="width: 300px;">Açıklama</td>
            <th style="width: 120px;">Borç</td>
            <th style="width: 120px;">Alacak</td>
            <th style="width: 120px;">İşlem</td>
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
    echo "<td>".$trh."</td>";
    echo "<td>".$res['belge_no']."</td>";
    echo "<td>".$res['kaytip_adi']."</td>";
    echo "<td>".$vdtrh."</td>";
    echo "<td>".$res['aciklama']."</td>";
    echo "<td class='num';>".$formatB."</td>";	
    echo "<td class='num';>".$formatA."</td>";	
    echo "<td><a class='button' href='hareket.php?id=$res[id]'>Düzenle</a>
    <a class='button' href='hareket.php?id=$res[id]'>Sil</a></td>";
    echo "</tr>";	
}
?>
</table>

</div> 

<?php  require_once '_footer.php';?>
