<?php  require_once '_header.php'?>

<?php
  
$result = mysqli_query($baglan,"SELECT *from carikrt ORDER BY ckod");

?>
    <div class="container2">
        <div class="baslik">
            <p class="golge">Cari Genel Durum</p>

            
        </div>


    
    <table id="table_index">
        <tr>
            <th style="width: 100px;">Cari Kodu</td>
            <th style="width: 350px;">Cari İsim</td>
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
    echo "<td><a class='button' href=\"har_list.php?id=$res[id]\">Detay</a></td>";	
echo "</tr>"; 	
} ?>
    </table>
</div>
<?php  require_once '_footer.php';?>   
