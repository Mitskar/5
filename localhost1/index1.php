<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styles.css" type="text/css" />
	</head>
	<body>
	
<!--Форма ввода данных-->
		<h3 style="color:#39b54a">Прогноз погоды</h3>
		<form action="index1.php" method="get" id="action_form">
			<p>
				<label style="color: #32CD32" for="meteo-city"><b>Город:</b><input type="text" name="meteo-city" id="meteo-city" placeholder="Введите название города" /> 
				<FORM>
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
						<input type="button" onclick="location.href ='http://localhost1/index.php';" value="На главную"/>
						</label>
				</FORM>
				</label>
				
					
			</p>
			
		</form>
<!--Форма ввода данных-->
<!--Получение данных от сервера-->
	<?php
	if (!empty($_GET['meteo-city']) && !empty($_GET['meteo-ndays'])) {	
// получение данных
$urlOpenWeather	= 'http://api.openweathermap.org/data/2.5/forecast/daily?q=' . $_GET['meteo-city'].'&lang=ru&cnt=' . $_GET['meteo-ndays'] . '&mode=json&APPID=8f9a72034b007f6cfa294bf06e5ee17d';

// Чтение json файла
$getdataOpenWeather = file_get_contents($urlOpenWeather);
$dataOpenWeather = json_decode($getdataOpenWeather, true);

//отображение погоды
$i = 0;
$output .= '<div class="meteo">';
if (!empty($_GET['meteo-city']) && !empty($_GET['meteo-ndays'])) {
	$output .= '<h1 class="meteo-title1">Прогноз погоды в '.$dataOpenWeather['city']['name'].' на '.$dataOpenWeather['cnt'].' дней</h1>';
} else {
	$output .= '<h1 class="meteo-title1">Fill the form…</h1>';
}
echo '</div>';

	while ($dataOpenWeather['cnt']>$i) {{
	$output .= ' <div class="meteo-p'.$i.'">';
	$output .= '<h2 class="meteo-title2">'. date('d.m.Y', $dataOpenWeather['list'][$i]['dt']) .'</h2>';
	$output .= $dataOpenWeather['list'][$i]['weather'][0]['description'];
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['temp']['day']-273.15).'°C<br >';
	$output .= '<img class="meteo-icon" src="images/'.$dataOpenWeather['list'][$i]['weather'][0]['id'].'.png" alt="'.$dataOpenWeather['list'][$i]['weather'][0]['description'].'" ><br>';
	$output .= 'давление';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['pressure']/ 1.3332239).'мм рт. ст.<br>';
	$output .= 'влажность';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['humidity']).'%.<br>';
	echo '</div>';
	$i++;	
	}
	
	}
	echo $output.'</div>'.'</div>'.'</div>'.'</div>'.'</div>'.'</div>'.'</div>'.'</div>';
}
	?>
		<div style= "position:absolute;"> 
			<?php
			$q=$_GET['meteo-city'];
			?>
			<iframe
			width = "1400"
			height= "500"
			frameborder = "0" style="border:0"
			src="https://www.google.com/maps/embed/v1/search?key=AIzaSyC_iA3EkimwEG_6Px19uG6vB8XIqvYzIYs&q= <?php echo $q; ?>" allowfullscreen>
			 </iframe>                                           
		</div>
	<div id="footer">
	<div>
   &copy; Мицковский Дмитрий "Практика" openweathermap.com
   </div>
  </div>
	</body>
</html>

