<?php

	echo "<form action=\"admin.php?session=".$session_id."&controler=".$modules[$i]."&action=add_news\" method=\"post\">	
		  Nazwa:<br />
		  <input name=\"news_title\" value=\"\" /><br />
		  Tekst:<br />
		  <textarea name=\"news_context\" value=\"\" /></textarea><br />
		  
		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";