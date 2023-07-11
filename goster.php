<?php  require_once 'partials/header.php'?>

<?php
  
$goster = mysqli_query($baglan,"SELECT ckod_id, SUM(borc) AS borc_,SUM(alacak) AS alacak_, SUM(borc-alacak) AS bakiye_ FROM carihrk GROUP BY ckod_id");



?>
    <div class="container2">
        <div class="baslik">
            <p class="golge">Cari Genel Durum</p>

            
        </div>


    
    <table id="table_index">
        <tr>
            <th style="width: 100px;">Ckod_id</td>
            <th style="width: 150px;">Borç Toplamı</td>
            <th style="width: 150px;">Alacak Toplamı</td>
            <th style="width: 150px;">Bakiye</td>

        </tr>
        
<?php 


while($fld = mysqli_fetch_array($goster)) { 
    $formatBT= number_format($fld['borc_'],2);
    $formatAT= number_format($fld['alacak_'],2);
    $formatBK= number_format($fld['bakiye_'],2);
    
    
    

    
    echo "<tr>";
    echo "<td>".$fld['ckod_id']."</td>";
    echo "<td class='num';>".$formatBT."</td>";	
    echo "<td class='num';>".$formatAT."</td>";	
    echo "<td class='num';>".$formatBK."</td>";    
  	
echo "</tr>"; 	

$ckod_id= $fld['ckod_id'];
    $borc = $formatBT;
    $alacak = $formatAT;
    $bakiye = $formatBK;

    $carikrt = mysqli_query($baglan,"SELECT * FROM carikrt"); 
    while($alan = mysqli_fetch_array($carikrt)) { 

        $alan['id']=$ckod_id;
        $alan['borc_top']=$formatBT;
        $alan['alacak_top']=$formatAT;



    $aktar = mysqli_query($baglan,"UPDATE carikrt SET borc_top,alacak_top");
    while($alan = mysqli_fetch_array($aktar)) { 



}}}?>
    </table>
</div>
<?php 

    ?>
<?php  require_once 'partials/footer.php';?>   
