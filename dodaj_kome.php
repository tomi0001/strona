<?php
  require ("./clasy/os.php");
  require ("./clasy/mysql.php");
  
  $mysql = new baza;
  //$os = new os;

//$kome =  mysql_escape_string($_GET["kome"]);
print $kome;
$id_aktu =  mysql_escape_string($_GET["id_aktu"]);

$kome = str_replace("\n","<br>",$_GET["kome"]);
$kome = nl2br($kome);
//print $a;
//print $kome;

$mysql->dodaj_kome("zdjecia",$kome,$id_aktu);










?>
