<?php  require_once 'partials/dbconn.php'?>

<?php

$sql1 =mysqli_query($baglan, "SELECT ckod_id, SUM(borc) AS borc_,SUM(alacak) AS alacak_, SUM(borc-alacak) AS bakiye_ FROM carihrk GROUP BY ckod_id");

if (mysqli_num_rows($sql1) > 0) {
while($kay=mysqli_fetch_assoc($sql1)){

$ckod_id=$kay['ckod_id'];
$borc_t=$kay['borc_'];
$alacak_t=$kay['alacak_'];

$sql2 = "UPDATE carikrt SET borc_top=$borc_t,alacak_top=$alacak_t WHERE id=$ckod_id";

if (mysqli_query($baglan, $sql2)) {

} else {
  echo "Error updating record: " . mysqli_error($baglan);
}
}
}


?>