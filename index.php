<html>
	<head>
		<meta charset="UTF-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
	</head>
	<body>
	<!--Форма ввода данных-->
		<h3 style="color:#32CD32">Прогноз погоды</h3>
		<form action="index1.php" method="get" id="action_form">
			<p>
				<label style="color: #32CD32" for="meteo-city"><b>Город:</b><input type="text" name="meteo-city" id="meteo-city" placeholder="Введите название города" /> 
				
				Прогноз погоды на:
				
<SELECT name="meteo-ndays" >
    <label style="color: #32CD32" for="meteo-ndays">
	<OPTGROUP LABEL="Количество дней:">
        <OPTION>1 </OPTION> 
        <OPTION>3 </OPTION>
        <OPTION>5 </OPTION>
		<OPTION>7 </OPTION>
    </OPTGROUP>  
</SELECT>	дней
<input type="submit" value="Прогноз" onclick="form_submit();"/>
</label>
</label>	
</form>
		<!--Форма ввода данных-->
	<div id="footer">
	<div>
   &copy; Мицковский Дмитрий "Практика" openweathermap.com
   </div>
  </div>
	</body>
</html>
