<?php
$count = 1;
//any change might crash the used system of program
$d = date("ym");
if ($d > "1901"){ 
 while ($count < 2){
 echo include('text.php'); 
 $count++ ;}
    exit;
}
?>
