<?php require_once '_header.php';


$id = $_GET['id'];

//selecting data associated with this particular id
// $Sonuc_carihrk = mysqli_query($baglan,"SELECT * from carihrk WHERE (ckod_id=$id)");
$Qcarikrt = mysqli_query($baglan,"SELECT * from carikrt WHERE (id=$id)");

if (mysqli_num_rows($Qcarikrt) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Qcarikrt)) { 
?>



<div class="container2">
<div class="baslik"  id="glb" >
  KASA KAYIT EKRANI
  <br>

    Cari Kodu  : <?php echo $row["ckod"] ?> <br>
    Cari İsim  : <?php echo $row["cisim"] ?> <br>
<?php  
    }

 } 
    ?>
    
</div>
        






<div class="container pt-5">



<form method="POST">


<div class="row mb-3">
    <label for="inp_tip" class="col-sm-2 col-form-label">Kasa Hareket Tipi</label>
    <div class="col-sm-10">
<select  name="kayit_tip" class="form-select" aria-label="Default select example">
  <option selected>Seçiniz...</option>
  <option value=3>Kasa Tahsilat</option>
  <option value=4>Kasa Tediye</option>
</select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inp_ckod" class="col-sm-2 col-form-label">Tarih</label>
    <div class="col-sm-10">
      <input type="date" name="tarih" class="form-control" id="tarih">
    </div>
  </div>


  <div class="row mb-3">
    <label for="inp_cisim" class="col-sm-2 col-form-label">Belge No</label>
    <div class="col-sm-10">
    <input type="text" name="belge_no" class="form-control" id="belge_no">
    </div>
  </div>


  <div class="row mb-3">
    <label for="inp_cisim" class="col-sm-2 col-form-label">Açıklama</label>
    <div class="col-sm-10">
    <input type="text" name="aciklama" class="form-control" id="aciklama">
    </div>
  </div>

  
  <div class="row mb-3">
    <label for="inp_cisim" class="col-sm-2 col-form-label">Tutar</label>
    <div class="col-sm-10">
    <input type="number" name="tutar" class="form-control" id="tutar">
    </div>
  </div>

  
  <button type="submit" name="kaydet"  class="btn btn-primary">Kaydet</button>
</form>
</div>  


<?php 

if(isset($_POST['kaydet'])) {
				
                $tarih = $_POST['tarih'];
                $belge_no = $_POST['belge_no'];
                $aciklama = $_POST['aciklama'];
                $kayit_tip = $_POST['kayit_tip'];
                $tutar = $_POST['tutar'];
                $ckod_id = $id;
	
        if ($kayit_tip==3) {
            $alacak=$tutar;
            $borc=0;
        } elseif ($kayit_tip==4){
            $borc=$tutar;
            $alacak=0;
        }
        
                $sql_ekle ="INSERT INTO  
                carihrk (tarih,belge_no,aciklama,kayit_tip,borc,alacak,ckod_id) 
                VALUES ('$tarih','$belge_no','$aciklama','$kayit_tip','$borc','$alacak',$ckod_id)";
        
                $sonuc=mysqli_query($baglan,$sql_ekle);
                header("Location:index.php");
                // if(mysqli_affected_rows())
                // { header("Location:index.php");	
                
                // }else { header("Location:index.php"); }
            
            } 
            ?>     
        
<?php  require_once '_footer.php';?>
