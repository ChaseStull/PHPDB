<?php
	//Creates a new empty database
	function createEmptyDatabase($name){
		if(file_exists("phpdb/database/".$name.".json")){
			return "Error: This database already exists";
		}
		else{
			$File = fopen("phpdb/database/".$name.".json", "w");
			fwrite($File, array(""));
			fclose($File);
			return "Your new blank database: ".$name." was created successfully";
		}
	}

	//Creates a database with a user-specified number of tables
	function createDatabaseWithTables($name, $number_of_tables){
		if(file_exists("phpdb/database/".$name.".json")){
			return "Error: This database already exists";
		}
		else{
			for($i = 0; $i < $number_of_tables; $i++){
				if($i == 0){
					$File = fopen("phpdb/database/".$name.".json", "w");
					fwrite($File, array(""));
					fclose($File);
				}
				else{
					$File = fopen("phpdb/database/".$name.".json", "r");
					$content = json_decode(fread($File, filesize("phpdb/database/".$name.".json"), false, filesize("phpdb/database/".$name.".json")));
					fclose($File);
					array_push($content, array(""));
					$content = json_encode($content);
					$File = fopen("phpdb/database/".$name.".json", "w");
					fwrite($File, $content);
					fclose($File);
				}
			}
			return "Database with ".$number_of_tables." tables was created successfully";
		}
	}
?>