<?php  require_once 'partials/header.php'?>

<?php  require_once 'guncelle.php'?>

<?php
  
$result = mysqli_query($baglan,"SELECT *from carikrt ORDER BY ckod");

?>
<div class="container mt-6">
    <div class="row">
    <h1 class="golge">Cari Genel Durum</h1>
  
    </div>
    <div class="row">



    
    <table class="table_index">
        <tr>
            <th style="width: 120px;">Cari Kodu</td>
            <th style="width: 420px;">Cari İsim</td>
            <th style="width: 150px;">Borç Toplamı</td>
            <th style="width: 150px;">Alacak Toplamı</td>
            <th style="width: 150px;">Bakiye</td>
            <th style="width: 80px;">İşlem</td>
        </tr>
        
<?php 


while($res = mysqli_fetch_array($result)) { 
    $formatBT= number_format($res['borc_top'],2);
    $formatAT= number_format($res['alacak_top'],2);
    $formatBK= number_format($res['borc_top']-$res['alacak_top'],2);
    
     
    
    echo "<tr>";
    echo "<td>".$res['ckod']."</td>";
    echo "<td>".$res['cisim']."</td>";
    echo "<td class='num';>".$formatBT."</td>";	
    echo "<td class='num';>".$formatAT."</td>";	
    echo "<td class='num';>".$formatBK."</td>";    
    echo "<td><a class='btn btn-danger' href=\"har_list.php?id=$res[id]\">Detay</a></td>";	
echo "</tr>"; 	
} ?>
    </table>
</div>

    </div>


<?php  require_once 'partials/footer.php';?>   
