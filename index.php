<html>
	<head>
		<title>WineStore</title>
	</head>
	
	<body>
		Enter search details below
		<form action="answerMod.php" method="GET">
			Wine Name:	<input type="text" name="wineName" value=" ">	<br>
			Winery Name:	<input type="text" name="wineryName" value" ">	<br>
			Region Name:	
			<select name="regionName">
				<option value="regionNames">  </option> 
			</select>							<br>					
			Grape Variety:	
			<select> 
				<option value="grapeVariety">  </option>
			</select>							<br>					
			Years From		
			<select> 
				<option value="yearsFrom"></option>
			</select>
			To 
			<select>
				<option value="yearsTo"></option>
			</select>							<br>
			Min. in stock: 	<input type="text" name="min" value=" ">	<br>
			Max. ordered:	<input type="text" name="max" value=" ">	<br>
			Cost Range:	<input type="text" name="costRange" value=" ">	<br>
			<input type="Submit" value="Search">
		</form>
	</body>
</html>
