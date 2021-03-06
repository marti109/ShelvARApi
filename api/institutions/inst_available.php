<?php
	include_once "../../database.php";
	include_once "../../header_include.php";
	                                  
	if(isset($_GET['inst_id'])) {                                                               
		$inst_id = $_GET['inst_id'];                                  
		$db = new database();
		$db->query = "SELECT inst_id FROM institutions WHERE inst_id = ?";
		$db->params = array($inst_id);
		$db->type = 's';
		
		$result = $db->fetch();
		if(!empty($result)) {
			echo json_encode(array('result'=>"SUCCESS", 'inst_id'=>"TAKEN", 'message'=>"Institution ID already in use", 'errors'=>""));
		}
		else echo json_encode(array('result'=>"SUCCESS", 'inst_id'=>"AVAILABLE", 'message'=>"", 'errors'=>""));
	}
	else echo json_encode(array('result'=>"ERROR", 'errors'=>"No institution ID supplied"));
?>