<?php
  require ("../clasy/user.php");
  require ("../clasy/mysql.php");
  $nowy_user = new user;
  print $_COOKIE['user'];
$nowy_user->zapisz_czat($_GET["czat"]);




?>
