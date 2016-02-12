<?php





$id_aktu =  mysql_escape_string($_POST["id_aktu"]);
$id_kome =  mysql_escape_string($_POST["id_kome"]);
$zdjecia =  mysql_escape_string($_POST["zdjecia"]);
$aktu_kome = mysql_escape_string($_POST["aktu_kome"]);
$aktu = mysql_escape_string($_POST["aktu"]);


//$kome = str_replace("\n","<br>",$kome);
$kome = htmlspecialchars($_POST["kome"]);
$kome = nl2br($kome);
//print $a;
//print $kome;
$kome =  mysql_escape_string($kome);
$rezultat = $mysql->dodaj_kome($zdjecia,$kome,$id_aktu,$id_kome);

setcookie("typ3",$rezultat,time()+50);
if ($aktu == "id_aktu") {
  header("location: ./index.php?pozycja=$aktu_kome&id_aktu=$id_aktu");
}
else {
  header("location: ./index.php?pozycja=$aktu_kome&sciezka=$id_aktu");
}












?>
