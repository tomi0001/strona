<?php
if ( isset($_POST["czy"]) ) {
  if ($_POST["czy"] == "on") $czy = true;
  else $czy = false;
}
else $czy = "";
$zaloguj = $nowy_user->zaloguj($czy);

if ($zaloguj == 4 or $zaloguj == 1) {
  print ("<div class=tytul2><font class=normalna>Zalogowałeś się pomyślnie</font></div>");
  header("location: ./index.php?pozycja=aktu");
}
else {
  print ("<div class=tytul3>Zły login lub hasło</div>");
}

//print $s;














?>
