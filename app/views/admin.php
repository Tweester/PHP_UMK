<?php

	echo "</br></br><HTML>
		<HEAD>
			<meta charset=\"utf-8\" />
		</HEAD>";


	echo "<TR>";
	echo "<TD><b>Logowanie administrator:</TD></br>";
	echo $error;
	

		echo "<form action=\"admin.php?action=logowanie\" method=\"post\">	
			  Nick:<br />
			  <input name=\"admin_nick\" value=\"\" /><br />
			  Haslo:<br />
			  <input name=\"admin_password\" value=\"\" /><br />
			  
	 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
	 		  </form>";
