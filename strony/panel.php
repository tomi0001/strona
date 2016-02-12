<?php

$user = $nowy_user->sprawdz_czy_zalogowany();

if ($user != 2) {
  print ("<div class=tytul3>Nie masz dostępu do tej części strony</div>");
}
else {
  print ("<div id=panel2> &nbsp</div><div class=\"panel\">
	  
	  <a class=zwykla href=./index.php?pozycja=dodaj_aktu>Dodaj nową aktualność</a>
	  </div> 
	  
	  <div id=panel2> &nbsp</div>
	  <div class=\"panel\">
	  <a class=zwykla href=./index.php?pozycja=zablo_kome>Zablokuj komentarze</a>
	  </div> 

	  <div id=panel2> &nbsp</div>
	  <div class=\"panel\">
	  <a class=zwykla href=./index.php?pozycja=dodaj_zdje>Dodaj zdjęcie</a>
	  </div> 
	  
	  <div id=panel2> &nbsp</div>
	  <div class=\"panel\">
	  <a class=zwykla href=./index.php?pozycja=zablo_user>Zablokuj użytkownika</a>
	  </div> 
	  
	  <div id=panel2> &nbsp</div>
	  <div class=\"panel\">
	  <a class=zwykla href=./index.php?pozycja=staty>Statystyki</a>
	  </div> 	  
	  
	  </div>
	  ");
  
  
  
  
  
  
}













?>
