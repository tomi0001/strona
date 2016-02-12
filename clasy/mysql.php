<?php

//class baza {

  //public function polacz_z_baza() {
    
 $baza = new mysqli("localhost","root","a1234","moja");
    define ("login_admina","root");
    define ("haslo_admina","root9090");
    //ustaw na yes jeżeli chcesz, żeby goście mogli przeglądać użytkowników
    define ("uzytkownicy","yes");
    //ustaw na yes jeżeli chcesz, żeby goście mogli dodawać posty do aktualności
    define ("aktualnosci","yes");
    //ustaw na yes jeżeli chcesz, żeby goście mogli dodawać posty do galeri
    define ("galeria","yes");   
    //ile chcesz mieć wyników na stronie
    define ("ilosc_wynikow",10);
    //definuje szerokosc miniatórki
    define("szerokosc",200);
    //ustala ilość wyników dla galerii
    define("ilosc_wynikow_gale",8);
    //ustala ilość wyników dla aktualności
    define("ilosc_wynikow_aktu",6);
//  }


class baza {

function drukuj_odno($zapytanie2,$ilosc_wynikow,$pozycja) {
    global $baza;

    
    print ("<tr><div align=center><td colspan=9>");
    $zapytanie = $baza->query($zapytanie2);
    $zapytanie = $zapytanie->fetch_array();
    $petla = $zapytanie[0] / $ilosc_wynikow;
    if ( isset($_GET["granicznik"]) ) {
      $stan = ($_GET["granicznik"] + $ilosc_wynikow) / $ilosc_wynikow;
    }
    else {
      $stan = $ilosc_wynikow / $ilosc_wynikow;
    }
    if ( !isset($_GET["sort"]) and $pozycja == "user" ) {
      $_GET["sort"] = "login";
    }
    else if ( !isset($_GET["sort"] )) {
      $_GET["sort"] = "ip";
    }
    $stan2 = $stan + 2;
    $stan3 = $stan - 2;
    if ( strstr($petla,".") ) $petla++;

    $dwu = "";
    for ($i = 0;$i <= $petla-1;$i++) {
      $granicznik = $i * $ilosc_wynikow;
      $j = $i+1;
      if ($dwu != 3) {
	$dwu = 1;
      }
      if ($petla != 1) {

	if ($j == 1) {
	  print ("<a class=zwykla href=index.php?granicznik=$granicznik&pozycja=$pozycja&sort=$_GET[sort]>$j</a> ");
	}

	else if ($stan2 >= $j and $stan3 <= $j) {
	  print ("<a class=zwykla href=index.php?granicznik=$granicznik&pozycja=$pozycja&sort=$_GET[sort]>$j</a> ");
	}
	else {
	    print ("<a class=zwykla href=index.php?granicznik=$granicznik&pozycja=$pozycja&sort=$_GET[sort]>. </a>");
	}
      }
    }
    print ("</td></div></tr>");
  
  }
  
  public function dodaj_aktu($tytul,$tresc) {
    global $baza;
    if ($tytul == "" or $tresc == "") return false;
    $tresc = nl2br($tresc);
    $tytul = mysql_escape_string($tytul);
    $tresc = mysql_escape_string($tresc);
    
    $data = time();
    $baza->query("insert into aktualnosci(tytul,tresc,data) values ('$tytul','$tresc','$data')");
    return true;
    
  }
  
  public function drukuj_kome($aktu_czy_gale,$id_aktu) {
    global $baza;
    
    if ($aktu_czy_gale == "zdjecia") {
      $wybierz_kome = $baza->query("select tresc,id_usera,id_komentarza,system,przegladarka,zmienna_http,data,id_zdjecia,czy_anonim,zablokowany,id from komentarze   where  id_komentarza = '0' and id_zdjecia = '$id_aktu'  order by data DESC");
    }
    else {
      $wybierz_kome = $baza->query("select tresc,id_usera,id_komentarza,system,przegladarka,zmienna_http,data,id_aktu,czy_anonim,zablokowany,id from komentarze where  id_komentarza = '0' and id_aktu = '$id_aktu' order by data DESC");
    }
    print ("<table width=600 align=center>");
    while ($wybierz_kome2 = mysqli_fetch_array($wybierz_kome) ) {
    
    $user = $this->pokaz_usera($wybierz_kome2[1]);
    $online = $this->sprawdz_czy_online($wybierz_kome2[1]);
    $anonim = $this->sprawdz_czy_anonim_czy_admin($wybierz_kome2[10]);
    if ($user == "") {
      if ($anonim == false) $user = "<b>root</b>";
      else $user = "Anonim";
    }
    $online2 = "";
    $data2 = new data;
    $data2->oblicz_date($wybierz_kome2[6]);
    if ($online == false) $online2 = "<font class=offline>offline</font>";
    else $online2 = "<font class=online>online</font>";
    
      print ("<tr>
      
      
      
		<td colspan=4>
		 <font class=login>$user</font>
		
		</td>
		<td colspan=4>
		 $online2    
		
		</td>
		<td colspan=4><font class=data>" . 
		 $data2->data .     
		
		"</font></td>		
		
	     </tr>
	     <tr>
		<td colspan=9>
		 <font class=text>$wybierz_kome2[0]</font>
		
		</td>

	     </tr>
      	     <tr>
		<td colspan=4>
		 <font class=data title=\"$wybierz_kome2[5]\">$wybierz_kome2[3]</font>
		
		</td>
		<td colspan=4>
		 <font class=data title=\"$wybierz_kome2[5]\">$wybierz_kome2[4]</font>
		
		</td>
		<td colspan=4>");
		if ($aktu_czy_gale == "zdjecia") {
		 print ("<a class=zwykla href=./index.php?pozycja=gale_kome&sciezka=$id_aktu&id_kome=$wybierz_kome2[10]>odpowiedz</a>");
		}
		else {
		  print ("<a class=zwykla href=./index.php?pozycja=aktu_kome&id_aktu=$id_aktu&id_kome=$wybierz_kome2[10]>odpowiedz</a>");
		}
		 print ("
		
		</td>
	     </tr>
	     <tr>
		<td colspan=4>
		 <br><br>
		
		</td>
		
	     </tr>
      ");
    
    
    $this->drukuj_pod_kome($wybierz_kome2[10],$aktu_czy_gale,$id_aktu);
    }
  print ("</table>");
  }
  
  
  private function drukuj_pod_kome($id_kome,$aktu_czy_gale,$id_aktu) {
    global $baza;
    
    if ($aktu_czy_gale == "zdjecia") {
      $wybierz_kome = $baza->query("select tresc,id_usera,id_komentarza,system,przegladarka,zmienna_http,data,id_zdjecia,czy_anonim,zablokowany,id from komentarze   where id_komentarza = '$id_kome' and id_zdjecia = '$id_aktu'   order by data ");
    }
    else {
      $wybierz_kome = $baza->query("select tresc,id_usera,id_komentarza,system,przegladarka,zmienna_http,data,id_aktu,czy_anonim,zablokowany,id from komentarze where id_komentarza = '$id_kome'  and id_aktu = '$id_aktu' order by data ");
    }  
  
    while ($wybierz_kome2 = mysqli_fetch_array($wybierz_kome) ) {
    $user = $this->pokaz_usera($wybierz_kome2[1]);
    $online = $this->sprawdz_czy_online($wybierz_kome2[1]);
    $anonim = $this->sprawdz_czy_anonim_czy_admin($wybierz_kome2[10]);
    if ($user == "") {
      if ($anonim == false) $user = "<b>root</b>";
      else $user = "Anonim";
    }
    $online2 = "";
    $data2 = new data;
    $data2->oblicz_date($wybierz_kome2[6]);
    if ($online == false) $online2 = "<font class=offline>offline</font>";
    else $online2 = "<font class=online>online</font>";
    
      print ("<tr>
		<td width=10%><td colspan=4>
		 <font class=login>$user</font>
		
		</td>
		<td width=10%><td  colspan=4>
		 $online2    
		
		</td>
		<td width=10%><td  colspan=4><font class=data>" . 
		 $data2->data .     
		
		"</font></td>		
		
	     </tr>
	     <tr>
		<td width=10%><td colspan=9>
		 <font class=text>$wybierz_kome2[0]</font>
		
		</td>

	     </tr>
      	     <tr>
		<td width=10%><td  colspan=4>
		 <font class=data title=\"$wybierz_kome2[5]\">$wybierz_kome2[3]</font>
		
		</td>
		<td width=10%><td  colspan=4>
		 <font class=data title=\"$wybierz_kome2[5]\">$wybierz_kome2[4]</font>
		
		</td>
		<td width=10%><td  colspan=4>");
		
		if ($aktu_czy_gale == "zdjecia") {
		 print ("<a class=zwykla href=./index.php?pozycja=gale_kome&sciezka=$id_aktu&id_kome=$id_kome>odpowiedz</a>");
		}
		else {
		  print ("<a class=zwykla href=./index.php?pozycja=aktu_kome&id_aktu=$id_aktu&id_kome=$id_kome>odpowiedz</a>");
		}
		print ("</td>
	     </tr>
	     <tr>
		<td width=10%><td colspan=4>
		 <br><br>
		
		</td>
		
	     </tr>
      ");
    
    
    
    }
  
  }
  
  private function pokaz_usera($id_usera) {
    global $baza;
    $wybierz_login_usera = $baza->query("select login from user where id = '$id_usera' ");
    $wybierz_login_usera = mysqli_fetch_array($wybierz_login_usera);
    return $wybierz_login_usera[0];
    
  }
  
  private function sprawdz_czy_online($id_usera) {
    global $baza;
    $wybierz_date = $baza->query("select data_ostatniego from user where id = '$id_usera' ");
    $wybierz_date = mysqli_fetch_array($wybierz_date);
    $data = time();
    $data2 = $data - $wybierz_date[0];
    if ($data2 < 360) return true;
    else return false;
  
  }
  
  private function sprawdz_czy_anonim_czy_admin($id_kome) {
    global $baza;
    $sprawdz = $baza->query("select id_usera,czy_anonim from komentarze where id_usera = '0' and id = '$id_kome' ");
    $sprawdz = mysqli_fetch_array($sprawdz);
    if ($sprawdz[1] == 0) return false;
    else return true;
    
  }
  public function dodaj_kome($aktu,$tresc,$id_aktu,$id_kome) {
    global $baza;
    if ($tresc == "") return 1;
    $os = new os;
    if ( isset($_COOKIE["user"]) ) {
      $id_usera = $baza->query("select id from user where login = '$_COOKIE[user]' ");
      $id_usera = mysqli_fetch_array($id_usera);
      $czy_anonim = 0;
    }
    else {
      $id_usera[0] = 0;
      $czy_anonim = 1;
    }
 /*   if ( isset($_GET["id_kome"]) ) {
      $kome = mysql_escape_string($_GET["id_kome"]);
    }
    else $kome = ""; */
    $os2 = $os->os($_SERVER["HTTP_USER_AGENT"]);
    $browser = $os->browser($_SERVER["HTTP_USER_AGENT"]);
    $data = time();
    
    if ($aktu == "zdjecia") {
      $dodaj = $baza->query("insert into komentarze(tresc,id_usera,id_komentarza,id_zdjecia,system,przegladarka,zmienna_http,data,czy_anonim) values ('$tresc','$id_usera[0]','$id_kome','$id_aktu','$os2','$browser','$_SERVER[HTTP_USER_AGENT]','$data','$czy_anonim')");
      
    }
    else {
      $dodaj = $baza->query("insert into komentarze(tresc,id_usera,id_komentarza,id_aktu,system,przegladarka,zmienna_http,data,czy_anonim) values ('$tresc','$id_usera[0]','$id_kome','$id_aktu','$os2','$browser','$_SERVER[HTTP_USER_AGENT]','$data','$czy_anonim')");
    }
    return 0;
  }
}





//}















?>
