<html>
	<head>
		<meta charset="utf-8">
		<title>Rozgrywki futbolowe</title>
		<link rel="stylesheet" href="styl.css">
	</head>
	
	<body>
		<div id="banner">
			<h2>Światowe rozgrywki piłkarskie</h2>
			<img src="obraz1.jpg" alt="boisko">
		</div>
		<div style="text-align:center">
		<?php
			if($polaczenie = mysqli_connect('localhost','root','','egzamin'))
			{
				$zapytanie1 = "SELECT * FROM `rozgrywka` WHERE `zespol1` LIKE 'EVG';";
				if($rezultat = mysqli_query($polaczenie,$zapytanie1))
				{
					for($i = 0 ; $i < mysqli_num_rows($rezultat); $i++)
					{
						$zespol = mysqli_fetch_row($rezultat);
						echo "<div id='mecz'><h3>".$zespol[1]." - ".$zespol[2]."</h3><h4>".$zespol[3]."</h4>".$zespol[4]."</div>";	
					}
				}
				
				mysqli_close($polaczenie);
			}
		?>
		</div>
		<div id="glowny">
			<h2>Reprezentacja Polski</h2>
		</div>
		<div id="lewy">
			Podaj pozycję zawodników (1-bramkarze,  2-obrońcy, 3-pomocnicy, 4-napastnicy)
			<br>
			<form action="futbol.php" method="POST">
				<input type="number" name="pozycja">
				<input type="submit" value="Sprawdź">
			</form>
			<?php
				if(!empty($_POST['pozycja']))
				{
					if($_POST['pozycja'] >= 1 && $_POST['pozycja'] <= 4)
					{
						if($polaczenie2 = mysqli_connect('localhost','root','','egzamin'))
						{
							$zapytanie2 = "SELECT `imie`,`nazwisko` FROM `zawodnik` WHERE `pozycja_id` = '".$_POST['pozycja']."';";
							if($rezultat2 = mysqli_query($polaczenie2,$zapytanie2))
							{
								echo "<ol>";
								for($i = 0 ; $i < mysqli_num_rows($rezultat2); $i++)
								{
									$zawodnik = mysqli_fetch_row($rezultat2);
									echo "<li>".$zawodnik[0]." ".$zawodnik[1]."</li>";	
								}
								echo "</ol>";
							}
							mysqli_close($polaczenie2);
						}
						
					}else{
						echo "Podaj inną liczbę";
					}
				}
			?>
			
		</div>
		<div id="prawy">
			<img src="zad1.png" alt="piłkarz">
		</div>
		
	</body>


</html>