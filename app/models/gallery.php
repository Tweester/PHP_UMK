<?php

	//zapytania administratorskie
	$query_redner_gallery = "SELECT * FROM gallery";
	$query_render_photo = "SELECT * FROM gallery_photo WHERE photo_gallery = ";
	
	$query_active_gallery = "";
	$query_active_photo = "";
	
	$query_delete_gallery = "";
	$query_delete_photo = "";
	
	$query_admin_create_gallery = "INSERT INTO gallery (gallery_name) VALUES ('";
	$query_admin_last_gallery_id = "SELECT gallery_id FROM gallery ORDER BY gallery_id DESC LIMIT 1";
	$query_admin_add_photo = "INSERT gallery_photo (photo_gallery, photo_path) VALUES (";
