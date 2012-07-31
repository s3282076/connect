<!DOCTYPE HTML PUBLIC
	"-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html401/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Wine Search</title>
	</head>

	<body bgcolor="white">
	<?php
	
	function showError(){
			die("Error " . mysql_errno() . " : " . mysql_error());
		}
	
		require 'db.php';

		function displayWineList($connection, $query, $wineName, $wineryName){
			if(!($result= @ mysql_query ($query, $connection))){
				showerror();
			}
	
		$rowsFound = @ mysql_num_rows($result);

		if($rowsFound > 0){
			print  "Wine belonging to wineStore database<br>";
		
			print	"\n<table>\n<tr>".
				"\n\t<th>Wine Name</th>" .
				"\n\t<th>Winery Name </th>" .
				"\n\t<th>Region Name </th>" .
				"\n\t<th>Grape Variety </th>" .
				"\n\t<th>Year</th>" .
				"\n\t<th>Minimum</th>" .
				"\n\t<th>Maximum </th>" .
				"\n\t<th>Cost Range </th></tr>";
		
			while ($row = @ mysql_fetch_array($result)){
				print	"\n<tr>\n\t<td>{$row["wine_name"]}</td>" .
					"\n\t<td>{$row["winery_name"]}</td>" .
					"\n\t<td>{$row["region_name"]}</td>" .
					"\n\t<td>{$row["variety"]}</td>" .
					"\n\t<td>{$row["on_hand"]}</td>" .
					"\n\t<td>{$row["qty"]}</td>" .
					"\n\t<td>{$row["cost"]}</t>\n</tr>";	
			}
			print "\n</table>";
		}

		print "{$rowsFound} records found matching your criteria<br>";
	}
	
	if(! ($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))){
		die("Could not connect");
	}

	$wineName = $_GET['wineName'];
	$wineryName = $_GET['wineryName'];
	$regionName = $_GET['regionName'];
	$grapeVariety = $_GET['grapeVariety'];
	$yearsFrom = $_GET['yearsFrom'];
	$yearsTo = $_GET['yearsTo'];
	$min = $_GET['min'];
	$max = $_GET['max'];
	$costRange = $_GET['costRange'];
	
	if (!mysql_select_db(DB_NAME, $connection)){
		showerror();
	}

	$query =	"SELECT wine_id, wine_name, winery_name
			FROM wine, winery
			WHERE wine.winery_id = winery.winery_id";

	if (isset($wineName) && $wineName != "All"){
		$query .= " AND wine_name = '{$wineName}'";
	}

	if(isset($wineryName) && $wineryName !="All"){
		$query .= " AND winery_name = '{$wineryName}'";
	}
	
	displayWineList($connection, $query, $wineName, $wineryName);
	?>	
	</body>
<html>
