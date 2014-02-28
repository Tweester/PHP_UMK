<?php


	for($i = 0; $i < count($gallery_id); $i++)
	{
		echo "</br><b>".$gallery_title[$i]."</br>";
			
		for($j = 0; $j < count($photo_id[$i]); $j++)
		{
			echo "<TD><a href=\"".DIR_UPLOADS_DIR.$photo_path[$i][$j].".jpg\"><img src=\"". DIR_UPLOADS_DIR .$photo_path[$i][$j]."_150.jpg\"></a> </TD>";
		}
	 
	}
	
	