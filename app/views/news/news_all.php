<?php


	for($i = 0; $i < count($news_id); $i++)
	{
		echo "<TR>";
		echo "<TD><b>". $news_title[$i]. "</b> - ". $news_date[$i]. "</TD></br>";
		echo "<TD>". $news_context[$i]."</TD>";
		echo "<TD> <a href=index.php?controler=news&action=komentarze&id=".$news_id[$i].">Komentarze</a></TD></br>";
		echo "<TR></br></br>";
	}
