<?php

/**
 * @file get_by_id.php
 * 
 * Copyright 2011 by ShelvAR Team.
 * @version September 29, 2012
 * Retrieves a book_ping with the database id that is entered
 * The id entered, according to the db format, should be an 11 character integer
 */
 include "book_ping_lib.php"
 include ("../../db_info.php");
 
 // getting the entered ID and limiting by institution
 $ret = get_by_id(stripslashes($_GET["book_ping"],$_GET["institution"]); 
 
 function get_by_id($book_ping) {
	 if(isset($_GET["book_ping"]))
		$book_ping = $_GET['book_ping'];
	 
	 // Create a new mysqli object with database connection parameters
		$server = "localhost";
		$user ="mysql_username";
		$password = "mysql_pword";
		$database = "mysql_db";
		$con = new mysqli($server, $user, $password, $database);
		
		if(mysqli_connect_errno()) {
			echo "Connection Failed: " . mysqli_connect_errno();
			exit();
		}
		
		/* create a prepared statement */
		if($stmt - $con -> prepare("SELECT * from book_pings WHERE id = " + $book_ping) { //&& query_or_not ==true) {
		
			// Bind parameters
			$stmt -> bind_param("ssssssss",
			$book_info["book_tag"],
			$book_info["book_call"],
			$book_info["neighbor1_tag"],
			$book_info["neighbor1_call"],
			$book_info["neighbor2_tag"],
			$book_info["neighbor2_call"],
			$book_info["ping_time"],
			$institution);
		
			// Execute it
			$stmt -> execute();
		
			// Bind results
			$stmt -> bind_result($query_result);
			
			// Fetch value
			$stmt -> fetch();
			
			// Close statement
			$stmt -> close();		
		}

		if($query_result == FALSE) {
			Print 'SQL Select failed' . mysqli_error();
		} else {
			while ($row = mysqli_fetch_array($res2[$res_type = MYSQL_ASSOC ])) {
				// Because mysqli_fetch_array returns a string
				$book_info_string = $row;
				
				/* If returned as array, should fill book_info array
				$book_info[0] = $book_ping;
				$book_info[1] = $row["book_tag"];
				$book_info[2] = $row["book_call"];
				$book_info[3] = $row["neighbor1_tag"];
				$book_info[4] = $row["neighbor1_call"];
				$book_info[5] = $row["neighbor2_tag"];
				$book_info[6] = $row["neighbor2_call"];
				$book_info[7] = $row["ping_time"];
				$book_info[8] = $row["institution"];			
				*/
			}
			mysqli_free_result($res2);
		}
		
		
		
		/* Close connection */
		$con -> close();
		
	 return $book_info_string;
} 

return $ret;
 ?>