<html>

	<head>
		<title>Calcul</title>
	</head>
	
	<body>
	
		<form action="calculate.php" method="post" enctype="multipart/form-data">
			
			<table>
				<tr>
					<td>CSV file</td>
					<td><input type="file" name="csv" /></td>
				</tr>
				<tr>
					<td>Calculation</td>
					<td>
						<textarea name="formula"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Calculate" /></td>
				</tr>
			</table>
	
		</form>
	
	</body>

</html>