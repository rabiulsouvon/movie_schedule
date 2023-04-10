<?php

	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}
	
	function confirm_query($result_set){
		if(!$result_set){
			die("Database query failed");
		}
	}
	
	function form_errors($errors=array()){
		$output = "";
		if(!empty($errors)){
			$output .= "<div class=\"error\">";
			$output .= "Please fix the following errors:";
			$output .= "<ul>";
			foreach($errors as $key => $error){
				$output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";
		}
		return $output;
	}
	
	function find_all_subjects($public=true){
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		if($public){
			$query .= "WHERE visible = 1 ";
		}		
		$query .= "ORDER BY position ASC";	
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		return $subject_set;
	}
	
	function find_all_admins(){
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "ORDER BY username ASC";	
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	function find_subject_by_id($subject_id, $public=true){
		global $connection;
		
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = {$safe_subject_id} ";
		if($public){
			$query .= "AND visible = 1 ";
		}
		$query .= "LIMIT 1";	
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		if($subject = mysqli_fetch_assoc($subject_set)){
			return $subject;
		} else {
			return null;
		}		
	}
	
	function find_admin_by_id($admin_id){
		global $connection;
		
		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = {$safe_admin_id} ";
		$query .= "LIMIT 1";	
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else {
			return null;
		}		
	}
	
	function find_admin_by_username($username){
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";	
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else {
			return null;
		}		
	}
	
	function find_page_by_id($page_id, $public=true){
		global $connection;
		
		$safe_page_id = mysqli_real_escape_string($connection, $page_id);
		
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = {$safe_page_id} ";
		if($public){
			$query .= "AND visible = 1 ";
		}
		$query .= "LIMIT 1";	
		$page_set = mysqli_query($connection, $query);
		confirm_query($page_set);
		if($page = mysqli_fetch_assoc($page_set)){
			return $page;
		} else {
			return null;
		}		
	}
	
	function find_default_page_for_subject($subject_id){
		$page_set = find_pages_for_subject($subject_id);
		if($first_page = mysqli_fetch_assoc($page_set)){
			return $first_page;
		} else {
			return null;
		}
	}
	
	function find_selected_page($public=false){
		global $current_subject;
		global $current_page;
		
		if(isset($_GET["subject"])){
			$current_subject = find_subject_by_id($_GET["subject"], $public);
			if($current_subject && $public){
				$current_page = find_default_page_for_subject($current_subject["id"]);
			}else{
				$current_page = null;
			}			
		}elseif(isset($_GET["page"])){
			$current_page = find_page_by_id($_GET["page"], $public);
			$current_subject = null;
		}else{
			$current_subject = null;
			$current_page = null;
		}
	}
	
	function find_pages_for_subject($subject_id, $public=true){
		global $connection;
		
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE subject_id = {$subject_id} ";
		if($public){
			$query .= "AND visible = 1 ";
		}		
		$query .= "ORDER BY position ASC";	
		$page_set = mysqli_query($connection, $query);
		confirm_query($page_set);
		return $page_set;
	}

	function navigation($current_subject, $current_page){
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects(false);
		while($subject = mysqli_fetch_assoc($subject_set)){
			$output .= "<li";
			if($current_subject && $subject["id"] == $current_subject["id"]){
				$output .= " class=\"selected\"";
			}
			$output .= ">"; 
			$output .= "<a href=\"manage_content.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= $subject["menu_name"];
			$output .= "</a>";
			$page_set = find_pages_for_subject($subject["id"], false);
			$output .= "<ul class=\"pages\">";
			while($page = mysqli_fetch_assoc($page_set)){	
				$output .= "<li";
				if($current_page && $page["id"] == $current_page["id"]){
					$output .= " class=\"selected\"";
				}
				$output .= ">";						
				$output .= "<a href=\"manage_content.php?page=";
				$output .= urlencode($page["id"]);
				$output .= "\">";
				$output .= $page["menu_name"];
				$output .= "</a></li>";
			}
			mysqli_free_result($page_set);
			$output .= "</ul></li>";			
		}
		mysqli_free_result($subject_set);			
		$output .= "</ul>";
		return $output;
	}
	
	function public_navigation($current_subject, $current_page){
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects();
		while($subject = mysqli_fetch_assoc($subject_set)){
			$output .= "<li";
			if($current_subject && $subject["id"] == $current_subject["id"]){
				$output .= " class=\"selected\"";
			}
			$output .= ">"; 
			$output .= "<h4><a href=\"index.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= $subject["menu_name"];
			$output .= "</a></h4>";
			
			//if($current_subject["id"] == $subject["id"] || $current_page["subject_id"] == $subject["id"]){
				$page_set = find_pages_for_subject($subject["id"]);
				$output .= "<ul class=\"pages\">";
				while($page = mysqli_fetch_assoc($page_set)){	
					$output .= "<li";
					if($current_page && $page["id"] == $current_page["id"]){
						$output .= " class=\"selected\"";
					}
					$output .= ">";						
					$output .= "<a href=\"index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= $page["menu_name"];
					$output .= "</a></li>";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);				
			//}
			$output .= "</li>";		
		}
		mysqli_free_result($subject_set);			
		$output .= "</ul>";
		return $output;
	}
	
	// same as built-in password_hash()
	function password_encrypt($password){
		
		$hash_format = "$2y$10$";
		$salt_length = 22;
		
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;			
		$hash = crypt($password, $format_and_salt);
		return $hash;		
	}
	
	function generate_salt($length){
		
		$unique_random_string = md5(uniqid(mt_rand(), true));		
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_replace('+', '.', $base64_string);
		$salt = substr($modified_base64_string, 0, $length);
		return $salt;
	}
	
	//same as built-in password_varify()
	function password_check($password, $existing_hash){
		$hash = crypt($password, $existing_hash);
		if($password === $existing_hash){
			return true;
		}else{
			return false;
		}
	}
	
	function attempt_login($username, $password){
		$admin = find_admin_by_username($username);
		if($admin){
			if(password_check($password, $admin["password"])){
				return $admin;
			}else {
				return false;
			}
			
		}else {
			return false;
		}
	}
	
	function logged_in(){
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to("login.php");
		}
	}
	
?>











