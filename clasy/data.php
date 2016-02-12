<?php


class data {

public $data;

public function oblicz_date($data) {
    $data2 = date("Y-m-d H:i:s",$data);
    $czas_obecny = time();
    $czas_dodania = $czas_obecny - $data;
    if ($czas_dodania < 60) $this->data = "Mniej niż minutę temu";
    else if ($czas_dodania < 120) $this->data = "Mniej niż 2 minuty temu";
    else if ($czas_dodania < 180) $this->data = "Mniej niż 3 minuty temu";
    else if ($czas_dodania < 240) $this->data = "Mniej niż 4 minuty temu";
    else if ($czas_dodania < 300) $this->data = "Mniej niż 5 minut temu";
    else if ($czas_dodania < 360) $this->data = "Mniej niż 6 minut temu";
    else if ($czas_dodania < 480) $this->data = "Mniej niż 8 minut temu";
    else if ($czas_dodania < 600) $this->data = "Mniej niż 10 minut temu";
    else if ($czas_dodania < 900) $this->data = "Mniej niż 15 minut temu";
    else if ($czas_dodania < 1200) $this->data = "Mniej niż 20 minut temu";
    else if ($czas_dodania < 1500) $this->data = "Mniej niż 25 minut temu";
    else if ($czas_dodania < 1900) $this->data = "Około pół godziny temu";
    else if ($czas_dodania < 2400) $this->data = "Około 40 minut temu";
    else if ($czas_dodania < 2700) $this->data = "Około 45 minut temu";
    else if ($czas_dodania < 3000) $this->data = "Około 50 minut temu";
    else if ($czas_dodania < 3300) $this->data = "Około 55 minut temu";
    else if ($czas_dodania <= 3600) $this->data = "Około Godzinę temu";
    else {
	//$data2 = date("Y-m-d H:i:s",$czas_dodania);
	//$obecna_data = date("Y-m-d H:i:s");
	$data2_podzial = explode(" ",$data2);
	//$obecna_data_podzial = explode(" ",$obecna_data);
	
	//$data2_podzial2 = explode("-",$data2_podzial[0]);
	$data2_podzial3 = explode(":",$data2_podzial[1]);
	
	//$obecna_data_podzial2 = explode("-",$obecna_data_podzial[0]);
	//$obecna_data_podzial3 = explode(":",$obecna_data_podzial[1]);
	//if ($obecna_data_podzial2[2] == $data2_podzial2[2]) {
	    //$this->data = "Dzisiaj o godzinie " . $data2_podzial3[0] . " i minucie " . $data2_podzial3[1];
	//}
	//else if ($obecna_data_podzial2[2] != $data2_podzial2[2] and $czas_dodania < 80000) {
	  //  $this->data = "Wczoraj o godzinie " . $data2_podzial3[0] . " i minucie " . $data2_podzial3[1];
	//}
	//else {
	    
	
	    $dzien_tyg = date("l",strtotime($data2));
	    $dzien_tygodnia = $this->oblicz_dzien_tygodnia($dzien_tyg);
	    
	    if ($data2_podzial3[0] < 5 or $data2_podzial3[0] == 0) {
	      if ($data2_podzial3[0] == 0) $data2_podzial3[0] = 24;
	      $poprzedni_dzien = $this->oblicz_poprzedni_dzien($dzien_tygodnia);
	      $this->data = "W nocy z " . $poprzedni_dzien . " na " .  $dzien_tygodnia  .  " o godzinie " . $data2_podzial3[0] . " i minucie " . $data2_podzial3[1];
	    }
	    else if ( $czas_dodania < 604800) {
	      $this->data = $dzien_tygodnia . " o  godzinie " . $data2_podzial3[0] . " i minucie " . $data2_podzial3[1];
	    }
	    else {
	      $this->data = $data2;
	    }
	//}
    }
  }
  
  
  
   private function oblicz_dzien_tygodnia($dzien_tygodnia) {
    if ($dzien_tygodnia == "Monday") return "Poniedziałek";
    else if ($dzien_tygodnia == "Tuesday") return "Wtorek";
    else if ($dzien_tygodnia == "Wednesday") return "Środę";
    else if ($dzien_tygodnia == "Thursday") return "Czwartek";
    else if ($dzien_tygodnia == "Friday") return "Piątek";
    else if ($dzien_tygodnia == "Saturday") return "Sobotę";
    else return "Niedziele";

  }
   private function oblicz_poprzedni_dzien($dzien) {
    if ($dzien == "Poniedziałek") return "Niedzieli";
    if ($dzien == "Wtorek") return "Poniedziałku";
    if ($dzien == "Środę") return "Wtorku";
    if ($dzien == "Czwartek") return "Środy";
    if ($dzien == "Piątek") return "Czwartku";
    if ($dzien == "Sobotę") return "Piątku";
    else return "Soboty";
  
  }














}














?>
