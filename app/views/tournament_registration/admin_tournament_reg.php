<?php

	echo "<b>".$msg."</b></br>";
	echo "<TD>Lista zarejestrowanych grachy </br>
		Imię Nazwisko \tE-Mail \tMiasto \tKraj \tAktywny \tKonkurencja \tNazwa robota \tOrganizacja </br></br>";
	for($i = 0; $i < count($tr_id); $i++)
	{
		echo "<TD>
					 <b>Imię</b>: ".$tr_name[$i]."</br>".
					"<b>Nazwisko</b>: ".$tr_surname[$i]."</br>".
					"<b>E-Mail</b>: ".$tr_email[$i]."</br>".
					"<b>Miasto</b>: ".$tr_city[$i]."</br>".
					"<b>Kraj</b>: ".$tr_country[$i]."</br>".
					"<b>Aktywny</b>: ".$tr_active[$i]."</br>".
					"<b>Konkurencja</b>: ".$tr_tournament[$i]."</br>".
					"<b>Nazwa robota</b>: ".$tr_robot_name[$i]."</br>".
					"<b>Organizacja</b>: ".$tr_company[$i]."</br>"."
					<a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$tr_id[$i]."&action=active_player> Aktywuj</a>
					<a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$tr_id[$i]."&action=delete_player> Usuń</a></br></TD></br></br> ";	 
	}
