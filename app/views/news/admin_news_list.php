<?php

	echo "<b>".$msg."</b></br>";
	echo "<TD>Lista newsów</br>
		  <a href=admin.php?session=".$session_id."&controler=".$controler."&action=add_news>Dodaj Newsa</a></br></br></TD></br>";
	for($i = 0; $i < count($news_id); $i++)
	{
		echo "<TD>".$news_title[$i]." <a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$news_id[$i]."&action=delete_news>Usuń</a>
									  <a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$news_id[$i]."&action=edit_news>Edytuj</a></br></TD> ";	 
	}
