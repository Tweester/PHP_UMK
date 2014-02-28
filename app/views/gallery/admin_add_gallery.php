<?php

	echo $msg;
	
	for($i = 0; $i < count($gallery_id); $i++)
	{
		echo "</br><b>".$gallery_title[$i]."</b> - Aktywna: ".$gallery_active[$i]."
			</br><a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$gallery_id[$i]."&action=delete_gallery>Usuń galerię</a>
			<a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$gallery_id[$i]."&action=active_gallery>Aktywuj/Dezaktywuj</a></br>";
			
		for($j = 0; $j < count($photo_id[$i]); $j++)
		{
			echo "<TD> </br><img src=\"". DIR_UPLOADS_DIR .$photo_path[$i][$j]."_150.jpg\"></br></TD>";
			echo "<a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$photo_id[$i][$j]."&action=delete_photo>Usuń zdjęcie</a>
				  <a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$photo_id[$i][$j]."&action=active_photo>Aktywuj/Dezaktywuj zdjęcie</a></br>";
		}
	 
	}
	
	
	echo "";
	
	
	
	echo "</br><b>Dodaj galerie</b></br></br>";
	echo "<form enctype=\"multipart/form-data\" action=\"admin.php?session=".$session_id."&controler=".$controler."&action=add_gallery\" method=\"post\">	
		  Tytuł galerii:<br />
		  <input size=\"50\" name=\"gallery_title\" value=\"\" /><br />
		  Scieżka:<br />
		  <input type=\"file\" name=\"zip_file\" />
		  
 		  <input type=\"hidden\" name=\"action\" value=\"add_gallery\" />
 		  
 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";