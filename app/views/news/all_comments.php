<?php
	echo "<TR>";
	echo "<TD><b>". $news_title. "</b> - ". $news_date. "</TD></br>";
	echo "<TD>". $news_context."</TD></br></br>";
	
	echo "<TD><b>". $add_text . "</b></TD></br>";
	
	echo "<TD> Napisz komentarz: </TD></br>";
	
	echo "<form action=\"index.php?controler=news&action=new_coment\" method=\"post\">	
		  Imię:<br />
		  <input name=\"coment_nick\" value=\"\" /><br />
		  Komentarz:<br />
		  <textarea name=\"coment_context\" value=\"\" /></textarea><br />
		  
		  <input type=\"hidden\" name=\"coment_id\" value=\"".$news_id."\" />
 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";
	
	for($i = 0; $i < count($coment_author); $i++)
	{
		echo "<TR>";
		echo "<TD>". $coment_author[$i]. " - ". $coment_date[$i]. "</TD></br>";
		echo "<TD>". $coment_context[$i]."</TD>";
		echo "<TR></br></br>";
	}

	echo "<TD> <a href=index.php?controler=news&action=wszystkie>Powrót do newsów...</a></TD></br>";
	