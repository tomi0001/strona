<link href="./style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">


<?php
  require ("./clasy/mysql.php");
  require ("./clasy/user.php");
  require ("./clasy/data.php");
  require ("./clasy/file.php");
  require ("./clasy/os.php");
  $nowy_user = new user;
  $data = new data;
  $mysql = new baza;
?>

<div id=body>

  <div id=logo>
  <div align=top>
  
  
  
  
  
  </div>
  <?php
  if ( isset($_GET["pozycja"]) ) {
    $_GET["pozycja"] = mysql_escape_string($_GET["pozycja"]);
  }

  if ( $nowy_user->sprawdz_czy_zalogowany() == false) {
    print ("<div class=tytul id=logowanie>
    <a class=zwykla href=./index.php?pozycja=logowanie>Logowanie /</a> <a class=zwykla href=./index.php?pozycja=reje>Rejestracja</a></div>
    
    <div align=center><img src=./logo.jpg width=800></div>
    </div>");
    
  }
  else {
      print ("<div class=tytul id=logowanie>
    <div align=top><a class=zwykla href=./index.php?pozycja=wyloguj>Wyloguj</a></div></div>
    
    <div align=center><img src=./logo.jpg width=800></div>
    </div>
    ");
    $nowy_user->zaktualizuj_online();
  }
  
  ?>

  <div id=both>
  
  
  </div>
  
  <div id=menu>
    <div class=menu2>
    
    
    </div>
    <a href=index.php?pozycja=aktu>
    <div class=menu3>
    Aktualności
    
    </div></a>
    <div class=menu4>
    
    
    </div>
    <a href=index.php?pozycja=gale>
    <div class=menu3>
    Galeria
    
    </div></a>
    <div class=menu4>
    
    
    </div> 
    <a href=index.php?pozycja=user>
    <div class=menu3>
    Użytkownicy
    
    </div></a>
    <div class=menu4>
    
    
    </div> 
    <a href=index.php?pozycja=czat>
    <div class=menu3>
    Czat
    
    </div></a>
    <div class=menu4>
    
    
    </div> 
    <?php
    if ($nowy_user->typ == "root") {
      print ("<a href=index.php?pozycja=panel>
      <div class=menu3>
      Panel Administracyjny
    
      </div></a>");
    }
    ?>
  </div>
  <div id=odstep>
  
  </div>
  
  <div id=stopka>
  <br><br>
  <?php
    if ( isset($_GET["pozycja"]) ) $nowy_user->dodaj_staty($_GET["pozycja"]);
    
    if ( isset ($_GET["pozycja"]) ) {
      if ($_GET["pozycja"] == "aktu") {
	include ("./strony/aktu.php");
	print ("<title>Aktualności</title>");
      }
      if ($_GET["pozycja"] == "reje") {
	include ("./strony/rejestracja.php");
	print ("<title>Rejestracja</title>");
      }
      if ($_GET["pozycja"] == "logowanie") {
	include ("./strony/logowanie.php");
	print ("<title>Logowanie</title>");
      }
      if ($_GET["pozycja"] == "zaloguj") {
	include ("./strony/zaloguj.php");
	print ("<title>Logowanie</title>");
      }
      if ($_GET["pozycja"] == "wyloguj") {
	include ("./strony/wyloguj.php");
	print ("<title>Wylogowywanie</title>");
      }
      if ($_GET["pozycja"] == "user") {
	include ("./strony/user.php");
	print ("<title>Użytkownicy</title>");
      }
      if ($_GET["pozycja"] == "panel") {
	include ("./strony/panel.php");
	print ("<title>Panel Administracyjny</title>");
      }
      if ($_GET["pozycja"] == "dodaj_zdje") {
	include ("./strony/dodaj_zdje.php");
	print ("<title>Dodaj zdjęcie</title>");
      }
      if ($_GET["pozycja"] == "zapisz_zdjecie") {
	include ("./strony/zapisz_zdjecie.php");
	print ("<title>Zapisz zdjęcie</title>");
      }
      if ($_GET["pozycja"] == "gale") {
	include ("./strony/galeria.php");
	print ("<title>Galeria</title>");
      }
      if ($_GET["pozycja"] == "gale_kome") {
	include ("./strony/gale_kome.php");
	print ("<title>Galeria</title>");
      }
      if ($_GET["pozycja"] == "dodaj_kome") {
	include ("./strony/dodaj_kome.php");
	print ("<title>Komentarze</title>");
      }
      if ($_GET["pozycja"] == "staty") {
	include ("./strony/staty.php");
	print ("<title>Statystyki</title>");
      }
      if ($_GET["pozycja"] == "dodaj_aktu") {
	include ("./strony/dodaj_aktu.php");
	print ("<title>Aktualności</title>");
      }
      if ($_GET["pozycja"] == "dodaj_aktu2") {
	include ("./strony/dodaj_aktu2.php");
	print ("<title>Aktualności</title>");
      }
      if ($_GET["pozycja"] == "aktu_kome") {
	include ("./strony/aktu_kome.php");
	print ("<title>Aktualności</title>");
      }
      if ($_GET["pozycja"] == "czat") {
	include ("./strony/czat.php");
	print ("<title>Czat</title>");
      }
    }
  ?>
  
  </div>

<SCRIPT TYPE="text/javascript" SRC="java.js"></SCRIPT>


</div>
