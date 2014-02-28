<?php

	require_once DIR_MODELS . "gallery.php";
	
	@$action = $_GET["action"];
	@$category_id = $_GET["id"];
	$msg = "";

	function show_gallery($query_redner_gallery, $query_render_photo)
	{
		$result = mysql_query($query_redner_gallery);
		$i = 0;
		
		if($result)
		{
			while($row = mysql_fetch_array($result))
			{
				$gallery_id[$i] = $row['gallery_id'];
				$gallery_title[$i] = $row['gallery_name'];
				$gallery_active[$i] = $row['gallery_active'];
				
				if($gallery_active[$i] == 1)
					$gallery_active[$i] = "TAK";
				else
					$gallery_active[$i] = "NIE";
				
				$i++;
			}
			
			for($i = 0; $i < count($gallery_id); $i++)
			{
				$query = $query_render_photo.$gallery_id[$i];
				$result = mysql_query($query_render_photo.$gallery_id[$i]);

				$j = 0;
				
				while($row = mysql_fetch_array($result))
				{
					$photo_id[$i][$j] = $row['photo_id'];
					$photo_path[$i][$j] = $row['photo_path'];
					$j++;
				}
			}
		}
		
		require_once DIR_VIEWS . "gallery/show_gallery.php";
	}

	//funkcje administratorskie
	function render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg)
	{
		$result = mysql_query($query_redner_gallery);
		$i = 0;
		
		if($result)
		{
			while($row = mysql_fetch_array($result))
			{
				$gallery_id[$i] = $row['gallery_id'];
				$gallery_title[$i] = $row['gallery_name'];
				$gallery_active[$i] = $row['gallery_active'];
				
				if($gallery_active[$i] == 1)
					$gallery_active[$i] = "TAK";
				else
					$gallery_active[$i] = "NIE";
				
				$i++;
			}
			
			for($i = 0; $i < count($gallery_id); $i++)
			{
				$query = $query_render_photo.$gallery_id[$i];
				$result = mysql_query($query_render_photo.$gallery_id[$i]);

				$j = 0;
				
				while($row = mysql_fetch_array($result))
				{
					$photo_id[$i][$j] = $row['photo_id'];
					$photo_path[$i][$j] = $row['photo_path'];
					$j++;
				}
			}
		}
		
			require_once DIR_VIEWS . "gallery/admin_add_gallery.php";
	}
	
	
	function add_gallery($query_redner_gallery, $query_render_photo, $query_gallery_id, $query_create_gallery, $query_add_photo, $session_id, $controler, $msg)
	{
	
		$gallery_name = $_POST["gallery_title"];
		if ($_FILES["zip_file"]["error"] > 0)
		{
			$msg = "Błąd ".$_FILES["zip_file"]["error"];
			return render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg);
		}
		else 
		if($_FILES["zip_file"]["type"] != "application/zip")
		{
			$msg = "Plik nie jest .zip!";
			return render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg);
		}
		else
		{
			$filename = $_FILES["zip_file"]["name"];
			$directory = basename($filename, ".zip"); 
			
			mkdir(DIR_UPLOADS_DIR."gallery/".$directory, 0777);
			move_uploaded_file($_FILES["zip_file"]["tmp_name"], DIR_UPLOADS_DIR ."gallery/".$directory."/".$filename);
		}
				
		$zip = new ZipArchive;
		if ($zip->open(DIR_UPLOADS_DIR."gallery/".$directory."/".$filename) === TRUE)
		{
		    $zip->extractTo(DIR_UPLOADS_DIR."gallery/".$directory."/");
		    $zip->close();
			unlink(DIR_UPLOADS_DIR ."gallery/".$directory."/".$filename);
		} 
		else
		{
		    $msg = "Błąd wypakowywania plików!";
			return render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg);
		}
		
		$upolad_files = scandir(DIR_UPLOADS_DIR ."gallery/".$directory."/");
		
		$query_create_gallery = $query_create_gallery.$gallery_name."')";
		$result = mysql_query($query_create_gallery);
		
		if($result == NULL)
		{
			$msg = "Błąd utworzenia galerii!";
			return render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg);
		}
		
		$result = mysql_query($query_gallery_id);
		$row = mysql_fetch_array($result);		
		$gallery_id = $row[0];
		
		for($i = 2; $i < count($upolad_files); $i++)
		{
			$file_path = DIR_UPLOADS_DIR ."gallery/".$directory."/".$upolad_files[$i];
			$file_save_path = DIR_UPLOADS_DIR ."gallery/".$directory."/".basename($file_path, ".jpg"); 
			$file_db_path = "gallery/".$directory."/".basename($file_path, ".jpg"); 
		
			list($width, $height) = getimagesize($file_path);
			$size_px = 150;
			$thumb = imagecreatetruecolor($size_px, $size_px);
			$source = imagecreatefromjpeg($file_path);
			
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, $size_px, $size_px, $width, $height);
			imagejpeg($thumb, $file_save_path."_150.jpg");
			
			$query = $query_add_photo.$gallery_id.",'".$file_db_path."')";
			$result = mysql_query($query);
		}
		
		
		echo $msg;
	}

	function remove_photo($action, $query_del_gallery, $query_del_photo, $query_redner_gallery, $query_render_photo, $session_id, $controler, $msg)
	{
		if($action == "delete_photo")
		{
			
		}
		
		if($action == "delete_gallery")
		{
			
		}
	}
	
	
	
	function active_photo()
	{
		
	}

	
	if($action == NULL)
		show_gallery($query_redner_gallery, $query_render_photo);
	if($action == "admin")
		render_add_gallery($query_redner_gallery, $query_render_photo, $session_id, $controler, $msg);
	if($action == "add_gallery")
		add_gallery($query_redner_gallery, $query_render_photo, $query_admin_last_gallery_id, $query_admin_create_gallery, $query_admin_add_photo, $session_id, $controler, $msg);
	//if($action == "delete_photo" || $action == "delete_gallery")
	//	remove_photo($action, $query_redner_gallery, $query_render_photo, $session_id, $controler, $msg));
	

