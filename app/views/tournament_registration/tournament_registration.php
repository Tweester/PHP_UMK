<?php
	echo "<TR>";
	echo "<TD><b> Rejestracja na zawody</b></TD></br>";
	echo "<TD>Uzupełnij pola formularzu w celu zarejestrowania się na zawody CRT. Rejestracja oznacza akceptacje regulaminu!</TD></br></br>";

	for($i = 0; $i < count($error); $i++)
	{
			echo "<font color='red'>".$error[$i]."</font></br>";
	}
	
	echo "<form action=\"index.php?controler=tournament_registration&action=new_player\" method=\"post\">	

		  Imię:<br />
		  <input name=\"reg_name\" value=\"".$form_list[0]."\" /><br />
		  
		  Nazwisko:<br />
		  <input name=\"reg_surname\" value=\"".$form_list[1]."\" /><br />
		  
		  E-Mail:<br />
		  <input name=\"reg_email\" value=\"".$form_list[2]."\" /><br />
		  
		  E-Mail(ponownie):<br />
		  <input name=\"reg_email2\" value=\"".$form_list[3]."\" /><br />
		  
		  Kraj:<br />
		  <input name=\"reg_country\" value=\"".$form_list[4]."\" /><br />
		  
		  Miasto:<br />
		  <input name=\"reg_city\" value=\"".$form_list[5]."\" /><br />
		  
		  Organizacja/Szkola(nieobowiazkowe):<br />
		  <input name=\"reg_company\" value=\"".$form_list[6]."\" /><br />
		
		  Nazwa robota:<br />
		  <input name=\"reg_robo_name\" value=\"".$form_list[7]."\" /><br />	

		  Konkurencja:<br />		  	  
		  <select name=\"reg_tournament_class\">";  

		  for($i = 0; $i < count($tc_id); $i++)
		  {
		  		echo "<option value=\"".$tc_id[$i]."\">".$tc_name[$i]."</option>";

		  }

	echo "</select>	  		  	  
 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";
	
	