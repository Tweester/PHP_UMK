<?php

	echo "<b>Edycja News'a</b></br></br>";
	echo "<form action=\"admin.php?session=".$session_id."&controler=".$controler."&action=db_news\" method=\"post\">	
		  Tytuł:<br />
		  <input size=\"50\" name=\"news_title\" value=\"".$news_title."\" /><br />
		  Treść:<br />
		  <textarea cols=\"50\" rows=\"10\" name=\"news_context\" value=\"\" />".$news_context."</textarea><br />
		  
		  <input type=\"hidden\" name=\"news_id\" value=\"".$news_id."\" />
 		  <input type=\"hidden\" name=\"news_action\" value=\"".$action."\" />
 		  
 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";